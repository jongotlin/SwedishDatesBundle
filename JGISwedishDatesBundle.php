<?php

namespace JGI\SwedishDatesBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use JGI\SwedishDatesBundle\DependencyInjection\Compiler\RedDayPass;

class JGISwedishDatesBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RedDayPass());
    }
}
