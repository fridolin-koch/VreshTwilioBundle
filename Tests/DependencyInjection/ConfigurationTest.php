<?php
namespace Vresh\TwilioBundle\Tests\DependencyInjection;

use Vresh\TwilioBundle\DependencyInjection\Configuration;
/**
 * Test the configuration tree
 *
 * @author Fridolin Koch <info@fridokoch.de>
 *
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Vresh\TwilioBundle\Tests\DependencyInjection::getConfigTreeBuilder()
     */
    public function testGetConfigTreeBuilder()
    {
        $config = new Configuration();
        /** @var \Symfony\Component\Config\Definition\ArrayNode $node  */
        $node = $config->getConfigTreeBuilder();
        //check root path
        $this->assertEquals('twilio', $node->getPath());
        //get child nodes and check them
        /** @var \Symfony\Component\Config\Definition\ScalarNode[] $children  */
        $children = $node->getChildren();
        //check length
        $this->assertEquals(4, count($children));
        //check if all config values are available
        $this->assertArrayHasKey('sid', $children);
        $this->assertArrayHasKey('authToken', $children);
        $this->assertArrayHasKey('version', $children);
        $this->assertArrayHasKey('retryAttempts', $children);
    }
}