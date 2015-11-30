<?php

namespace CosmoW\DoctrineRiakAdminBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class AddGuesserCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {

        // ListBuilder
        $definition = $container->getDefinition('sonata.admin.guesser.doctrine_riak_list_chain');
        $services = array();
        foreach ($container->findTaggedServiceIds('sonata.admin.guesser.doctrine_riak_list') as $id => $attributes) {
            $services[] = new Reference($id);
        }

        $definition->replaceArgument(0, $services);

        // DatagridBuilder
        $definition = $container->getDefinition('sonata.admin.guesser.doctrine_riak_datagrid_chain');
        $services = array();
        foreach ($container->findTaggedServiceIds('sonata.admin.guesser.doctrine_riak_datagrid') as $id => $attributes) {
            $services[] = new Reference($id);
        }

        $definition->replaceArgument(0, $services);

        // ShowBuilder
        $definition = $container->getDefinition('sonata.admin.guesser.doctrine_riak_show_chain');
        $services = array();
        foreach ($container->findTaggedServiceIds('sonata.admin.guesser.doctrine_riak_show') as $id => $attributes) {
            $services[] = new Reference($id);
        }

        $definition->replaceArgument(0, $services);
    }
}
