<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    /**
     * @return \Aggrosoft\CookieDatabase\Api\Client
     */
    public function getClient () {
        return new \Aggrosoft\CookieDatabase\Api\Client('en');
    }

    public function testGetServiceTypes(): void
    {
        $client = $this->getClient();
        $types = $client->getServiceTypes();
        $this->assertIsArray($types);
        $this->assertNotEmpty($types);
    }

    public function testGetCookiePurposes(): void
    {
        $client = $this->getClient();
        $purposes = $client->getCookiePurposes();
        $this->assertIsArray($purposes);
        $this->assertNotEmpty($purposes);
    }

    public function testGetServices(): void
    {
        $client = $this->getClient();
        $services = $client->getServices(['Google Analytics', 'Facebook']);
        $this->assertIsArray($services);
        $this->assertNotEmpty($services);
    }

    public function testGetCookieInfo(): void
    {
        $client = $this->getClient();
        $infos = $client->getCookieInfos(['Some' => ['_js_datr', '_gat_UA']]);
        $this->assertIsArray($infos);
        $this->assertNotEmpty($infos);
    }

    public function testGetWebsiteCookies(): void
    {
        $client = $this->getClient();
        $cookies = $client->getWebsiteCookies('https://www.cap-bedrucken.de');
        var_dump($cookies);
    }
}