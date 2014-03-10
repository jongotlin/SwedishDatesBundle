<?php

namespace JGI\SwedishDatesBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class RedDayPass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('jgi.swedish_dates.red_day.chain')) {
            return;
        }

        $definition = $container->getDefinition('jgi.swedish_dates.red_day.chain');
        $taggedServices = $container->findTaggedServiceIds('jgi.swedish_dates.red_day.rule');

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('addRedDayRule', [new Reference($id)]);
        }
    }
}
