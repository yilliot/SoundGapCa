<?php

namespace Elliot\CommonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('elliot_common');


        $rootNode
            ->children()
                ->arrayNode('s3')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('construct')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('certificate_authority')->defaultFalse()->end()
                                ->scalarNode('credentials')->defaultNull()->end()
                                ->scalarNode('default_cache_config')->defaultNull()->end()
                                ->scalarNode('key')->defaultNull()->end()
                                ->scalarNode('secret')->defaultNull()->end()
                                ->scalarNode('token')->defaultNull()->end()
                            ->end()
                        ->end()
                        ->arrayNode('others')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('cache_config_location')->defaultValue('/tmp/cache')->end()
                                ->scalarNode('cache_config_gzip')->defaultTrue()->end()
                                ->scalarNode('disable_ssl')->defaultFalse()->end()
                                ->scalarNode('disable_ssl_verification')->defaultFalse()->end()
                                ->scalarNode('retries')->defaultValue(3)->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('memcached')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('servers')
                        ->isRequired()
                        ->requiresAtLeastOneElement()
                        ->prototype('array')
                            ->children()
                                ->scalarNode('host')->isRequired()->cannotBeEmpty()->end()
                                ->scalarNode('port')->defaultValue(11211)->cannotBeEmpty()->end()
                                ->scalarNode('weight')->defaultValue(1)->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
            ;

        return $treeBuilder;
    }
}
