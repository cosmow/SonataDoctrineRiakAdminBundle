<?php

namespace CosmoW\DoctrineRiakAdminBundle\DependencyInjection;

use Sonata\AdminBundle\DependencyInjection\AbstractSonataAdminExtension;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * SonataAdminBundleExtension.
 *
 */
class SonataDoctrineRiakAdminExtension extends AbstractSonataAdminExtension
{
    /**
     * @param array            $configs   An array of configuration settings
     * @param ContainerBuilder $container A ContainerBuilder instance
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configs = $this->fixTemplatesConfiguration($configs, $container);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('doctrine_riak.xml');
        $loader->load('doctrine_riak_filter_types.xml');
        $loader->load('security.xml');

        $configuration = new Configuration();
        $processor = new Processor();
        $config = $processor->processConfiguration($configuration, $configs);

        $pool = $container->getDefinition('sonata.admin.manager.doctrine_riak');

        $container->setParameter('sonata_doctrine_riak_admin.templates', $config['templates']);

        // define the templates
        $container->getDefinition('sonata.admin.builder.doctrine_riak_list')
            ->replaceArgument(1, $config['templates']['types']['list']);

        $container->getDefinition('sonata.admin.builder.doctrine_riak_show')
            ->replaceArgument(1, $config['templates']['types']['show']);
    }
}
