<?php declare(strict_types=1);

namespace Neusta\Pimcore\ConverterBundle\DependencyInjection;

use Neusta\Pimcore\ConverterBundle\Source\SymfonySourceProvider;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * TEMPLATE Remove when your bundle does not need a services.yaml
 * TEMPLATE Remove when your bundle does not need the 'Configuration.php'
 */
final class NeustaPimcoreConverterExtension extends ConfigurableExtension
{
    public function loadInternal(array $mergedConfig, ContainerBuilder $container): void
    {
        $loader = new PhpFileLoader($container, new FileLocator(\dirname(__DIR__, 2) . '/config'));
        $loader->load('services.yaml');
    }

    private function getTranslationFileDirectories(ContainerBuilder $container): array
    {
        $directories = [];

        // Add translation directories of bundles
        foreach ($container->getParameter('kernel.bundles_metadata') as ['path' => $bundleDir]) {
            if (is_dir($dir = $bundleDir . '/Resources/translations') || is_dir($dir = $bundleDir . '/translations')) {
                $directories[] = $dir;
            }
        }

        // Add translation directory of project
        $projectDir = $container->getParameter('kernel.project_dir');
        if (is_dir($dir = $projectDir . '/Resources/translations') || is_dir($dir = $projectDir . '/translations')) {
            $directories[] = $dir;
        }

        return $directories;
    }
}
