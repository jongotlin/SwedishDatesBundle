<?php

namespace JGI\SwedishDatesBundle\DependencyInjection\Compiler;

use JGI\SwedishDates\Date\DayChain;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class DayPass implements CompilerPassInterface
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition(DayChain::class)) {
            return;
        }

        $definition = $container->getDefinition(DayChain::class);
        $taggedServices = $container->findTaggedServiceIds('jgi.swedish_dates.day');

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('addDay', [new Reference($id)]);
        }
    }
}
