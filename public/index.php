<?php

use Emberfuse\Base\Kernel;
use Emberfuse\Base\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * Emberfuse - A simple PHP micro framework.
 *
 * @author   Thavarshan Thayananthajothy <tjthavarshan@gmail.com>
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Bootstrap Emberfuse application and register all necessary services.
 *
 * @var \Emberfuse\Base\Contracts\ApplicationInterface
 */
$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
 * Load application routes.
 */
$app->getRouter()->loadRoutes(function ($router) {
    require dirname(__DIR__) . '/routes.php';
});

/*
 * New up the HTTP kernel instance.
 *
 * @var \Symfony\Component\HttpKernel\HttpKernelInterface
 */
$kernel = new Kernel($app);

/*
 * Handle/Capture an incoming HTTP request.
 *
 * @var \Symfony\Component\HttpFoundation\Response
 */
$response = $kernel->handle(
    Request::createFromGlobals(),
    HttpKernelInterface::MASTER_REQUEST,
    getenv('APP_DEBUG')
);

/*
 * Send the appropriate response.
 */
$response->send();
