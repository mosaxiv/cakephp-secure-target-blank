<?php

namespace SecureTargetBlank\View\Helper;

/**
 * {@inheritdoc}
 */
class HtmlHelper extends \Cake\View\Helper\HtmlHelper
{
    /**
     * {@inheritdoc}
     */
    public function link($title, $url = null, array $options = [])
    {
        if (isset($options['target']) && $options['target'] === '_blank') {
            $options['rel'] = $options['rel'] ?? [];
            if (is_string($options['rel'])) {
                $options['rel'] = explode(' ', $options['rel']);
            }
            $options['rel'] = array_merge($options['rel'], ['noopener', 'noreferrer']);
            $options['rel'] = array_unique($options['rel']);
        }

        return parent::link($title, $url, $options);
    }
}
