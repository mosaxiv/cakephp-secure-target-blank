# SecureTargetBlank plugin for CakePHP

[![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
[![Build Status](https://travis-ci.org/mosaxiv/cakephp-secure-target-blank.svg?branch=master)](https://travis-ci.org/mosaxiv/cakephp-secure-target-blank)

Adds noopener and noreferrer to target _blank in Html Helper.

If you use the `target="_blank"` attribute on a link, you are leaving your users open to a very simple phishing attack. Adding `rel="noopener noreferrer"` on those links will prevent this vulnerability.  
[Further reading.](https://www.jitbit.com/alexblog/256-targetblank---the-most-underestimated-vulnerability-ever/)


## Requirements

- PHP 7.0+
- CakePHP 3.0.0+

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require mosaxiv/cakephp-secure-target-blank
```

## Usage

### AppView Setup

load Helper
```php
// src/View/AppView.php

namespace App\View;

use Cake\View\View;
use SecureTargetBlank\View\Helper\HtmlHelper;

class AppView extends View
{
    public function initialize()
    {
        $this->loadHelper('Html', [
            'className' => HtmlHelper::class
        ]);
    }
}
```

### Helper Usage

Use the `Html->link()` with `[target => "_blank"]`, `rel="noopener noreferrer"` will be added.

Html Helper:
```php
$this->Html->link('test', 'http://example.com', ['target' => '_blank']
```

will render this HTML:
```html
'<a href="http://example.com" target="_blank" rel="noopener noreferrer">test</a>'

```
