<?php
namespace Vresh\TwilioBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration
{
    /**
* Generates the configuration tree.
*
* @return \Symfony\Component\DependencyInjection\Configuration\NodeInterface
*/
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('twilio', 'array');
        $rootNode
                ->children()
                ->scalarNode('sid')->defaultValue('')->end()
                ->scalarNode('authToken')->defaultValue('')->end()
                ->scalarNode('version')->defaultValue('2010-04-01')->end()
                ->scalarNode('certPath')->defaultValue('./twilio_ssl_certificate.crt')->end()
            ->end();

        return $treeBuilder->buildTree();
    }
}