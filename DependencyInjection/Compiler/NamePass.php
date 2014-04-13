<?php

namespace JGI\SwedishDatesBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class NamePass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('jgi.swedish_dates.name.chain')) {
            return;
        }

        $definition = $container->getDefinition('jgi.swedish_dates.name.chain');
        $taggedServices = $container->findTaggedServiceIds('jgi.swedish_dates.name');

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('addName', [new Reference($id)]);
        }
    }
}
