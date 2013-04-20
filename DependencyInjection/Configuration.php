<?php
namespace Vresh\TwilioBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This file is part of the VreshTwilioBundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Fridolin Koch <info@fridokoch.de>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\Config\Definition\NodeInterface
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('twilio');

        $rootNode
            ->children()
            ->scalarNode('sid')->isRequired()->end()
            ->scalarNode('authToken')->isRequired()->end()
            ->scalarNode('version')->defaultValue('2010-04-01')->end()
            ->scalarNode('retryAttempts')->defaultValue(1)->end()
            ->end();

        return $treeBuilder->buildTree();
    }
}