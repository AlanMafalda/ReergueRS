<?php
/**
 * @license MIT
 *
 * Modified by impress-org on 15-May-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace Give\Vendors\Faker\ORM\Mandango;

use Mandango\Mandango;

/**
 * Service class for populating a database using Mandango.
 * A Populator can populate several tables using ActiveRecord classes.
 */
class Populator
{
    protected $generator;
    protected $mandango;
    protected $entities = [];
    protected $quantities = [];

    public function __construct(\Give\Vendors\Faker\Generator $generator, Mandango $mandango)
    {
        $this->generator = $generator;
        $this->mandango = $mandango;
    }

    /**
     * Add an order for the generation of $number records for $entity.
     *
     * @param mixed $entity A Propel ActiveRecord classname, or a \Faker\ORM\Propel\EntityPopulator instance
     * @param int   $number The number of entities to populate
     */
    public function addEntity($entity, $number, $customColumnFormatters = [])
    {
        if (!$entity instanceof \Faker\ORM\Mandango\EntityPopulator) {
            $entity = new \Give\Vendors\Faker\ORM\Mandango\EntityPopulator($entity);
        }
        $entity->setColumnFormatters($entity->guessColumnFormatters($this->generator, $this->mandango));

        if ($customColumnFormatters) {
            $entity->mergeColumnFormattersWith($customColumnFormatters);
        }
        $class = $entity->getClass();
        $this->entities[$class] = $entity;
        $this->quantities[$class] = $number;
    }

    /**
     * Populate the database using all the Entity classes previously added.
     *
     * @return array A list of the inserted entities.
     */
    public function execute()
    {
        $insertedEntities = [];

        foreach ($this->quantities as $class => $number) {
            for ($i = 0; $i < $number; ++$i) {
                $insertedEntities[$class][] = $this->entities[$class]->execute($this->mandango, $insertedEntities);
            }
        }
        $this->mandango->flush();

        return $insertedEntities;
    }
}
