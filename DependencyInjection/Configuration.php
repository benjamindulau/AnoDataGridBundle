<?php

namespace Ano\Bundle\DataGridBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ano_data_grid');

        $this->addTwigSection($rootNode);

        return $treeBuilder;
    }

    private function addTwigSection(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('twig')
                    ->addDefaultsIfNotSet()
                    ->fixXmlConfig('resource')
                    ->children()
                        ->arrayNode('resources')
                            ->addDefaultsIfNotSet()
                            ->defaultValue(array('grid_layout.html.twig'))
                            ->validate()
                                ->ifTrue(function($v) { return !in_array('grid_layout.html.twig', $v); })
                                ->then(function($v){
                                    return array_merge(array('grid_layout.html.twig'), $v);
                                })
                            ->end()
                            ->prototype('scalar')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
