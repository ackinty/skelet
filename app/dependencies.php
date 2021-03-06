<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension(new Twig_Extensions_Extension_Text());

    // global load for template
    $view->offsetSet('appname', $settings['app']['appname']);

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Controller factories
// -----------------------------------------------------------------------------

$container['App\BaseController'] = function ($c) {
    return new App\BaseController($c->get('view'), $c->get('logger'), $c->get('settings')['app']);
};
$container['App\Controller\HomeController'] = function ($c) {
    return new App\Controller\HomeController($c->get('view'), $c->get('logger'), $c->get('settings')['app']);
};

$container['notFoundHandler'] = function($c) {
    $errorController = new App\Controller\ErrorController($c->get('view'), $c->get('logger'), $c->get('settings')['app']);
    return $errorController->get404($c);
};
