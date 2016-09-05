<?php

namespace Tests\AppBundle\Controller;

use AppBundle\DataFixtures\ORM\LoadFixtures;
use AppBundle\Entity\PlanDay;
use AppBundle\Repository\PlanDayRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlanControllerTest extends WebTestCase
{
    public function testShouldDisplayTable()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertGreaterThan(1, $crawler->filter(".data")->count());
    }

    public function testCanNavigateToDetails()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $link = $crawler->filter('a:contains("Details")')->link();
        $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $crawler = $client->getCrawler();

        $this->assertGreaterThanOrEqual(1, $crawler->filter('.entries')->count());
    }

    public function testNumberOfEntriesMatchesDatabase()
    {
        $mock = $this->getMockBuilder(PlanDayRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mock->expects($this->any())
            ->method("findBy")
            ->willReturn([
                $this->mockPlanDay(),
                $this->mockPlanDay()
            ])
        ;

        $emMock = $this->getMockBuilder(ObjectManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $emMock->expects($this->any())
            ->method("getRepository")
            ->willReturn($mock)
        ;

        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $link = $crawler->filter('a:contains("Details")')->link();
        $client->click($link);
        $crawler = $client->getCrawler();

        $this->assertEquals(1, $crawler->filter('.entries')->count());
    }

    public function mockPlanDay()
    {
        $mockDay = $this->getMock(PlanDay::class);
        return $mockDay;
    }
}