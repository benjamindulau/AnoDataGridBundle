<?php

namespace Ano\Bundle\DataGridBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Ano\Bundle\DataGridBundle\DependencyInjection\Compiler\AddTemplatePathPass;

class AnoDataGridBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AddTemplatePathPass());
    }
}
