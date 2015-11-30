<?php

namespace CosmoW\DoctrineRiakAdminBundle;

use CosmoW\DoctrineRiakAdminBundle\DependencyInjection\Compiler\AddGuesserCompilerPass;
use CosmoW\DoctrineRiakAdminBundle\DependencyInjection\Compiler\AddTemplatesCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CosmoWDoctrineRiakAdminBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new AddGuesserCompilerPass());
        $container->addCompilerPass(new AddTemplatesCompilerPass());
    }
}
