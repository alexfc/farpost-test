<?php

namespace BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Simple blog on Symfony', $client->getResponse()->getContent());
    }

    public function testShow()
    {
        //Собственно здесь должен быть код для тестирование экшена show,
        //но тестировать его есть смысл только на тестовыой базе, так как ее нет, то тест будет падать на любой базе,
        //кроме моей

        $client = static::createClient();

        $client->request('GET', '/posts/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Test', $client->getResponse()->getContent());
    }

    public function testPageNotFound()
    {
        $client = static::createClient();

        $client->request('GET', '/posts/99999999');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
