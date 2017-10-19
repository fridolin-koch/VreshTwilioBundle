<?php

namespace Vresh\TwilioBundle\Tests\DependencyInjection;

use Symfony\Component\Yaml\Parser;
use Vresh\TwilioBundle\DependencyInjection\Configuration;

/**
 * Test the configuration tree.
 *
 * @author Fridolin Koch <info@fridokoch.de>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testGetConfigTreeBuilder()
    {
        $config = new Configuration();
        /** @var \Symfony\Component\Config\Definition\ArrayNode $node */
        $tree = $config->getConfigTreeBuilder()->buildTree();
        //check root name
        $this->assertEquals('twilio', $tree->getName());
        //get child nodes and check them
        /** @var \Symfony\Component\Config\Definition\ScalarNode[] $children */
        $children = $tree->getChildren();
        //check length
        $this->assertCount(4, $children);
        //check if all config values are available
        $this->assertArrayHasKey('sid', $children);
        $this->assertArrayHasKey('authToken', $children);
        $this->assertArrayHasKey('version', $children);
        $this->assertArrayHasKey('retryAttempts', $children);
    }

    public function testYamlFile()
    {
        $yaml   = new Parser();
        $config = $yaml->parse(file_get_contents(realpath(__DIR__.'/../../Resources/config/services.yml')));
        //validate config
        $this->assertArrayHasKey('parameters', $config);
        $this->assertArrayHasKey('services', $config);
        $this->assertArrayHasKey('twilio.api', $config['services']);
        $this->assertArrayHasKey('class', $config['services']['twilio.api']);
        // capability test
        $this->assertArrayHasKey('twilio.capability', $config['services']);
        $this->assertArrayHasKey('class', $config['services']['twilio.capability']);
        $this->assertArrayHasKey(str_replace('%', '', $config['services']['twilio.capability']['class']), $config['parameters']);
        $this->assertArrayHasKey(str_replace('%', '', $config['services']['twilio.api']['class']), $config['parameters']);
        // lookups
        $this->assertArrayHasKey('twilio.lookups', $config['services']);
        $this->assertArrayHasKey('class', $config['services']['twilio.lookups']);
        $this->assertArrayHasKey(str_replace('%', '', $config['services']['twilio.lookups']['class']), $config['parameters']);
    }
}
