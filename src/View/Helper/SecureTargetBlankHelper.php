<?php

namespace SecureTargetBlank\View\Helper;

use Cake\View\Helper\HtmlHelper;

/**
 * {@inheritdoc}
 */
class SecureTargetBlankHelper extends HtmlHelper
{
    /**
     * {@inheritdoc}
     */
    public function link($title, $url = null, array $options = [])
    {
        parent::link($title, $url, $options);
    }
}