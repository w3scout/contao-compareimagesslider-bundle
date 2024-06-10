<?php

/*
 * This file is part of CompareImagesSlider.
 *
 * (c) Darko Selesi 2024 <hallo@w3scouts.com>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/w3scout/contao-compareimagesslider-bundle
 */
declare(strict_types=1);

namespace W3Scout\ContaoCompareimagessliderBundle\Tests\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\DelegatingParser;
use Contao\TestCase\ContaoTestCase;
use W3Scout\ContaoCompareimagessliderBundle\ContaoManager\Plugin;
use W3Scout\ContaoCompareimagessliderBundle\W3ScoutContaoCompareimagessliderBundle;

/**
 * @package W3Scout\ContaoCompareimagessliderBundle\Tests\ContaoManager
 */
class PluginTest extends ContaoTestCase
{
    /**
     * Test Contao manager plugin class instantiation
     */
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(Plugin::class, new Plugin());
    }

    /**
     * Test returns the bundles
     */
    public function testGetBundles(): void
    {
        $plugin = new Plugin();

        /** @var array $bundles */
        $bundles = $plugin->getBundles(new DelegatingParser());

        $this->assertCount(1, $bundles);
        $this->assertInstanceOf(BundleConfig::class, $bundles[0]);
        $this->assertSame(W3ScoutContaoCompareimagessliderBundle::class, $bundles[0]->getName());
        $this->assertSame([ContaoCoreBundle::class], $bundles[0]->getLoadAfter());
    }

}
