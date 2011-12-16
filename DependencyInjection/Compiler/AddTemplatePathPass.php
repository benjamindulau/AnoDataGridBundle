<?php
namespace Ano\Bundle\DataGridBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class AddTemplatePathPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('twig.loader')) {
            return;
        }
        $refl = new \ReflectionClass('Ano\DataGrid\DataGridInterface');
        $path = dirname($refl->getFileName()).'/Resources/views';
        $container->getDefinition('twig.loader')->addMethodCall('addPath', array($path));
    }
}
