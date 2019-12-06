<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\SampleInterception\Plugin;

use Magento\Catalog\Model\View\Asset\Image;

class PluginAround
{

    $damBaseUrl = 'https://author-cm-p3994-e9219-ns-team-skysandboxprod5.ethos13-prod-va7.ethos.adobe.net';
    /**
     * 1) Wraps the input to the base method in (around: before base method)(/around: before base method) tags
     * 2) Wraps the output of the base method in (around: after base method)(/around: after base method) tags
     *
     * The base method capitalizes strings, so the "before base" tags will be affected, and the "after base"
     * tags will not.
     *
     * The after plugin receives all of the base method's arguments, calls the base method via closure,
     * and returns what will be seen as the output of the base method.
     *
     * @param ChildAround $subject
     * @param callable $proceed
     * @param string $interceptedInput
     * @return string
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function aroundGetUrl(Image $subject, \Closure $proceed)
    {
        $filePath = $subject->getFilePath();
        if (strpos($filePath, '/content/dam/') === 0) {
            return $damBaseUrl . $filePath;
        } else {
            return $proceed();
        }
        return $filePath;
    }
}