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

use W3Scout\ContaoCompareimagessliderBundle\Controller\ContentElement\CompareImagesSliderController;

/**
 * Content elements
 */
$GLOBALS['TL_DCA']['tl_content']['palettes'][CompareImagesSliderController::TYPE] = '{type_legend},type,headline;{config_legend},singleSRC_before,singleSRC_after,size,default_offset_pct,auto_hover,vertical_mode;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

// ToDo: Add https://img-comparison-slider.sneas.io/examples.html#before-and-after-labels

$GLOBALS['TL_DCA']['tl_content']['fields']['singleSRC_before'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC_before'],
    'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'w50'),
    'sql'                     => "binary(16) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['singleSRC_after'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC_after'],
    'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'w50'),
    'sql'                     => "binary(16) NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['default_offset_pct'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['default_offset_pct'],
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'maxlength'=>3, 'tl_class'=>'clr w50'),
    'sql'                     => "varchar(3) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['vertical_mode'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['vertical_mode'],
    'filter'                  => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 cbx m12'),
    'sql'                     => array('type' => 'boolean', 'default' => false)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['auto_hover'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['auto_hover'],
    'filter'                  => true,
    'inputType'               => 'checkbox',
    'eval'                    => array('tl_class'=>'w50 cbx m12'),
    'sql'                     => array('type' => 'boolean', 'default' => false)
);
