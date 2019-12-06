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
     *
     * @param Magento\Catalog\Model\View\Asset\Image $subject
     * @param callable $proceed Image#getUrl()
     * @return string image url
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
    }
}