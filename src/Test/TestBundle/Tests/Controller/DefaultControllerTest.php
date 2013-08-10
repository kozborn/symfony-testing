<?php

namespace Test\TestBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
//       
        $this->assertTrue($crawler->filter('html:contains("Blog homepage")')->count() > 0);
    }
}
