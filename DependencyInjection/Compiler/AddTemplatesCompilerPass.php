<?php

namespace CosmoW\DoctrineRiakAdminBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AddTemplatesCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        foreach ($container->findTaggedServiceIds('sonata.admin') as $id => $attributes) {
            if (!isset($attributes[0]['manager_type']) || $attributes[0]['manager_type'] != 'doctrine_riak') {
                continue;
            }

            $definition = $container->getDefinition($id);
            $templates = $container->getParameter('sonata_doctrine_riak_admin.templates');

            if (!$definition->hasMethodCall('setFormTheme')) {
                $definition->addMethodCall('setFormTheme', array($templates['form']));
            }

            if (!$definition->hasMethodCall('setFilterTheme')) {
                $definition->addMethodCall('setFilterTheme', array($templates['filter']));
            }
        }
    }
}
