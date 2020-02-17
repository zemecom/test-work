<?php

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalcControllerTest extends WebTestCase
{
    public function testSum()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/sum', [
            '545343.133',
            '0.9098908',
            '112321231',
        ]);

        $result = $client->getResponse()
            ->getContent();

        $this->assertStringContainsString('112866575.0428908', $result);

        static::assertResponseIsSuccessful();
    }

    public function testSumEmptyRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/sum');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testSumMinCountRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/sum', ['545343.133']);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testSumNonNumRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/sum', ['A545343.133']);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testSub(){
        $client = static::createClient();
        $client->request('POST', '/api/calc/sub', [
            '545343.133',
            '0.9098908',
            '112321231',
        ]);

        $result = $client->getResponse()
            ->getContent();

        $this->assertStringContainsString('-111775888.7768908', $result);

        static::assertResponseIsSuccessful();
    }

    public function testSubEmptyRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/sub');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testSubMinCountRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/sub', ['545343.133']);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testSubNonNumRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/sub', ['A545343.133']);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testDiv(){
        $client = static::createClient();
        $client->request('POST', '/api/calc/mul', [
            '545343.133',
            '0.9098908',
            '112321231',
        ]);

        $result = $client->getResponse()
            ->getContent();

        $this->assertStringContainsString('55734098040088.4754558484', $result);

        static::assertResponseIsSuccessful();
    }

    public function testDivEmptyRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/mul');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testDivMinCountRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/mul', ['545343.133']);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testDivNonNumRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/api/calc/mul', ['A545343.133']);
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }
}