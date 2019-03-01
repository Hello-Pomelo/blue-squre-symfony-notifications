<?php

namespace Bluesquare\TestBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

final class TestExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $config = $this->processConfiguration(new Configuration(), $configs);
        // $definition = $container->getDefinition('bluesquare.test_bundle.foo');

        return $config;
        // $this->configurePersistence($loader, $container, $config['provider']);
        // $this->configureAuthorizationServer($container, $config['authorization_server']);
        // $this->configureResourceServer($container, $config['resource_server']);
        // $this->configureScopes($container, $config['scopes']);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'bluesquare.test_bundle';
    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        //
    }

    private function configureScopes(ContainerBuilder $container, array $scopes): void
    {
        /*$scopeManager = $container
            ->getDefinition(
                $container->getAlias(ScopeManagerInterface::class)
            )
        ;

        foreach ($scopes as $scope) {
            $scopeManager->addMethodCall('save', [
                new Definition(ScopeModel::class, [$scope]),
            ]);
        }*/
    }
}
