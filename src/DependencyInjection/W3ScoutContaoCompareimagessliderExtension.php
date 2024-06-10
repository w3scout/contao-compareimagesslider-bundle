<?php

declare(strict_types=1);

/*
 * This file is part of CompareImagesSlider.
 *
 * (c) Darko Selesi 2024 <hallo@w3scouts.com>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/w3scout/contao-compareimagesslider-bundle
 */

namespace W3Scout\ContaoCompareimagessliderBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class W3ScoutContaoCompareimagessliderExtension extends Extension
{
    /**
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        );

        $loader->load('parameters.yaml');
        $loader->load('services.yaml');
        $loader->load('listener.yaml');
    }
}
