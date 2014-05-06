<?php

namespace Kairos\Bundle\GeoTimezoneBundle\Tests\DependencyInjection;

use Kairos\Bundle\GeoTimezoneBundle\DependencyInjection\GeoTimezoneExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;

class GeoTimezoneExtensionTest extends \PHPUnit_Framework_TestCase
{
    protected $configuration;

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testThrowsExceptionUnlessSourceUrlIsValid()
    {
        $loader = new GeoTimezoneExtension();
        $config = $this->getEmptyConfig();
        $config['source_url'] = 'test';
        $loader->load(array($config), new ContainerBuilder());
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testThrowsExceptionParameterDoesNotExist()
    {
        $loader = new GeoTimezoneExtension();
        $config = $this->getEmptyConfig();
        $config['ploof'] = 'azert';
        $loader->load(array($config), new ContainerBuilder());
    }

    public function testLoadEmptyConfDefaults()
    {
        $this->createEmptyConfiguration();
        $this->assertParameter('http://download.geonames.org/export/dump/cities15000.zip', 'geo_timezone.source_url');
    }

    public function testLoadFullConfDefaults()
    {
        $this->createFullConfiguration();
        $this->assertParameter('http://www.test.com', 'geo_timezone.source_url');
    }

    public function testLoadFormServiceEmptyConfWithDefaults()
    {
        $this->createEmptyConfiguration();
        $this->assertNotHasDefinition('geo_timezone.source_url');
    }

    /**
     * create empty configuration
     */
    protected function createEmptyConfiguration()
    {
        $this->configuration = new ContainerBuilder();
        $loader = new GeoTimezoneExtension();
        $config = $this->getEmptyConfig();
        $loader->load(array($config), $this->configuration);
        $this->assertTrue($this->configuration instanceof ContainerBuilder);
    }

    protected function createFullConfiguration()
    {
        $this->configuration = new ContainerBuilder();
        $loader = new GeoTimezoneExtension();
        $config = $this->getFullConfig();
        $loader->load(array($config), $this->configuration);
        $this->assertTrue($this->configuration instanceof ContainerBuilder);
    }

    /**
     * getEmptyConfig
     *
     * @return array
     */
    protected function getEmptyConfig()
    {
        $parser = new Parser();
        return $parser->parse('');
    }

    protected function getFullConfig()
    {
        $yaml = <<<EOF
source_url:  http://www.test.com
EOF;
        $parser = new Parser();
        return  $parser->parse($yaml);
    }

    /**
     * @param mixed  $value
     * @param string $key
     */
    private function assertParameter($value, $key)
    {
        $this->assertEquals($value, $this->configuration->getParameter($key), sprintf('%s parameter is correct', $key));
    }

    /**
     * @param string $id
     */
    private function assertNotHasDefinition($id)
    {
        $this->assertFalse(($this->configuration->hasDefinition($id) ?: $this->configuration->hasAlias($id)));
    }
}
