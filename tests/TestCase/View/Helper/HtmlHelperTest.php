<?php

namespace SecureTargetBlank\Test\TestCase\View\Helper;

use Cake\Routing\Router;
use Cake\TestSuite\TestCase;
use Cake\View\View;
use SecureTargetBlank\View\Helper\HtmlHelper;

class HtmlHelperTest extends TestCase
{
    /**
     * Instance of HtmlHelper.
     *
     * @var HtmlHelper
     */
    public $Html;

    public function setUp()
    {
        parent::setUp();
        Router::connect('/:controller/:action/*');
        $this->Html = new HtmlHelper(new View());
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testLink()
    {
        $expected = $this->Html->link('test_title', ['controller' => 'test']);
        $actual = '<a href="/test/index">test_title</a>';
        $this->assertEquals($expected, $actual);

        $expected = $this->Html->link('test_title', ['controller' => 'test'], ['target' => '_blank']);
        $actual = '<a href="/test/index" target="_blank" rel="noopener noreferrer">test_title</a>';
        $this->assertEquals($expected, $actual);

        $expected = $this->Html->link('test_title', ['controller' => 'test'], ['target' => '_blank', 'rel' => 'noopener']);
        $actual = '<a href="/test/index" target="_blank" rel="noopener noreferrer">test_title</a>';
        $this->assertEquals($expected, $actual);

        $expected = $this->Html->link('test_title', ['controller' => 'test'], ['target' => '_blank', 'rel' => 'nofollow']);
        $actual = '<a href="/test/index" target="_blank" rel="nofollow noopener noreferrer">test_title</a>';
        $this->assertEquals($expected, $actual);

        $expected = $this->Html->link('test_title', ['controller' => 'test'], ['target' => '_blank', 'rel' => 'nofollow test']);
        $actual = '<a href="/test/index" target="_blank" rel="nofollow test noopener noreferrer">test_title</a>';
        $this->assertEquals($expected, $actual);

        $expected = $this->Html->link('test_title', ['controller' => 'test'], ['target' => '_blank', 'rel' => ['nofollow', 'test']]);
        $actual = '<a href="/test/index" target="_blank" rel="nofollow test noopener noreferrer">test_title</a>';
        $this->assertEquals($expected, $actual);

        $expected = $this->Html->link('test_title', ['controller' => 'test'], ['target' => '_blank', 'secureBlank' => false]);
        $actual = '<a href="/test/index" target="_blank">test_title</a>';
        $this->assertEquals($expected, $actual);

        $expected = $this->Html->link('test_title', ['controller' => 'test'], ['target' => '_blank', 'secureBlank' => false, 'rel' => 'nofollow']);
        $actual = '<a href="/test/index" target="_blank" rel="nofollow">test_title</a>';
        $this->assertEquals($expected, $actual);
    }
}
