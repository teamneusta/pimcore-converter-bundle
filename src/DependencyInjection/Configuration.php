<?php declare(strict_types=1);

namespace Neusta\Pimcore\ConverterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * TEMPLATE Remove when not needed.
 * It is not needed, if your bundle is working, but this file is not touched
 * TEMPLATE Replace neusta-pimcore-template
 * Naming convention: https://symfony.com/doc/current/bundles/configuration.html#using-the-bundle-extension
 */
final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('neusta-pimcore-converter');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
