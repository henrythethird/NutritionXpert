<?php

namespace Tests\AppBundle\Repository;

use AppBundle\Entity\Ingredient;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class IngredientRepositoryTest
 * @package Tests\AppBundle\Repository
 * @group functional
 */
class IngredientRepositoryTest extends KernelTestCase
{
    const CONTAINS_NAME = "asdf albert asdf";

    /**
     * @var EntityManager
     */
    private $em;

    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchByName()
    {
        $repo = $this->em
            ->getRepository(Ingredient::class);
        $singleObj = $repo->findOneBy(['name' => self::CONTAINS_NAME]);

        if (!$singleObj) {
            $testIngredient = new Ingredient();
            $testIngredient->setName(self::CONTAINS_NAME);

            $this->em->persist($testIngredient);
            $this->em->flush();
        }

        $objects = $repo->byNameContains("albert");

        $this->assertGreaterThanOrEqual(1, count($objects));
    }
}