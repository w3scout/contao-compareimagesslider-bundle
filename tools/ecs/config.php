<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    if (is_file(__DIR__.'/vendor/contao/easy-coding-standard/config/contao.php')) {
        // CI
        $ecsConfig->sets([__DIR__.'/vendor/contao/easy-coding-standard/config/contao.php']);
    } else {
        // local development
        $ecsConfig->sets([__DIR__.'/../../../../../vendor/contao/easy-coding-standard/config/contao.php']);
    }

    $ecsConfig->ruleWithConfiguration(HeaderCommentFixer::class, [
        'header' => "This file is part of contao-compareimagesslider-bundle.\n\n(c) Darko Selesi ".date('Y')." <hallo@w3scouts.com>\n@license GPL-3.0-or-later\nFor the full copyright and license information,\nplease view the LICENSE file that was distributed with this source code.\n@link https://github.com/w3scout/contao-compareimagesslider-bundle",
    ]);

    $ecsConfig->skip([
        '*/contao/dca*',
        MethodChainingIndentationFixer::class => [
            'DependencyInjection/Configuration.php',
        ],
    ]);

    $ecsConfig->parallel();
    $ecsConfig->lineEnding("\n");
};
