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

namespace W3Scout\ContaoCompareimagessliderBundle\Controller\ContentElement;

use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\ContentModel;
use Contao\Image\ImageInterface;
use Contao\Image\ResizeOptions;
use Contao\StringUtil;
use Contao\Template;
use Contao\System;
use Contao\FilesModel;
use Contao\Image\ResizeConfiguration;
use Contao\FrontendTemplate;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Imagine\Gd\Imagine;
use Contao\Image\Resizer;
use Contao\Image\Image;

use Contao\CoreBundle\String\HtmlAttributes;

#[AsContentElement(category:'media', template:'ce_compare_images_slider')]
class CompareImagesSliderController extends AbstractContentElementController
{
    public const TYPE = 'compare_images_slider';

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {

        if($model->singleSRC_before && $model->singleSRC_after)
        {
            # $rootDir = System::getContainer()->getParameter('kernel.project_dir');
            # dump($rootDir);

            $figure = System::getContainer()
                ->get('contao.image.studio')
                ->createFigureBuilder()
                ->from($model->singleSRC_before)
                ->setSize($model->size)
                ->setOptions(['img_attr' => 'slot="first"'])
                ->buildIfResourceExists();

            $image = new FrontendTemplate('image_compare');
            $figure?->applyLegacyTemplateData($image);
            $template->image1 = $image->parse();

            $figure = System::getContainer()
                ->get('contao.image.studio')
                ->createFigureBuilder()
                ->from($model->singleSRC_after)
                ->setSize($model->size)
                ->setOptions(['img_attr' => 'slot="second"'])
                ->buildIfResourceExists();

            $image = new FrontendTemplate('image_compare');
            $figure?->applyLegacyTemplateData($image);
            $template->image2 = $image->parse();

            $template->offset_pct       = $model->default_offset_pct;
            $template->auto_hover       = $model->auto_hover ? 'hover="hover"' : '';
            $template->vertical_mode    = $model->vertical_mode ? 'direction="vertical"' : '';;

            $GLOBALS['TL_BODY'][]       = '<script src="bundles/w3scoutcontaocompareimagesslider/app.js"></script>';
            $GLOBALS['TL_CSS'][]        = 'bundles/w3scoutcontaocompareimagesslider/app.css';
        }

        return $template->getResponse();
    }
}
