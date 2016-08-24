<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IngredientControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', "/ingredient");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $link = $crawler->filter('a:contains("Add New Ingredient")')->link();
        $crawler = $client->click($link);

        $form = $crawler->selectButton("Save New Ingredient")->form();

        $form['ingredient_form[name]'] = 'TestIngredient';
        $form['ingredient_form[calories]'] = 10;
        $form['ingredient_form[fat]'] = 11;
        $form['ingredient_form[carbs]'] = 12;
        $form['ingredient_form[protein]'] = 14;
        $form['ingredient_form[alcohol]'] = 0;

        $crawler = $client->submit($form);
    }
}