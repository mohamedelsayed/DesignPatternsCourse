<?php

namespace Tests;

use Behavioral\TemplateMethod\HomePage;
use Behavioral\TemplateMethod\LoginPage;
use Behavioral\TemplateMethod\NotFoundPage;
use Behavioral\TemplateMethod\RegisterPage;
use PHPUnit\Framework\TestCase;

class TemplateMethodTest extends TestCase
{
    public function testCanRenderHomePage()
    {
        $page = new HomePage();
        $renderedPage = $page->renderPage();
        $this->assertStringContainsString('<body>List Of New Feeds</body>', $renderedPage);
        $this->assertStringNotContainsString('<body>Login Form</body>', $renderedPage);
        $this->assertStringContainsString('<footer>Contact Us and Site Map</footer>', $renderedPage);
    }

    public function testCanRenderLoginPage()
    {
        $page = new LoginPage();
        $renderedPage = $page->renderPage();
        $this->assertStringNotContainsString('<body>List Of New Feeds</body>', $renderedPage);
        $this->assertStringNotContainsString('<footer>Contact Us and Site Map</footer>', $renderedPage);
        $this->assertStringContainsString('<body>Login Form</body>', $renderedPage);
    }

    public function testCanRender404Page()
    {
        $page = new NotFoundPage();
        $renderedPage = $page->renderPage();
        $this->assertStringNotContainsString('<body>List Of New Feeds</body>', $renderedPage);
        $this->assertStringContainsString('<body>404 message</body>', $renderedPage);
        $this->assertStringContainsString('<footer>Contact Us and Site Map</footer>', $renderedPage);
        $this->assertStringNotContainsString('<body>Login Form</body>', $renderedPage);
    }

    public function testCanRenderRegisterPage()
    {
        $page = new RegisterPage();
        $renderedPage = $page->renderPage();
        $this->assertStringNotContainsString('<body>List Of New Feeds</body>', $renderedPage);
        $this->assertStringNotContainsString('<footer>Contact Us and Site Map</footer>', $renderedPage);
        $this->assertStringContainsString('<body>Register Form</body>', $renderedPage);
    }
}
