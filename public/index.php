<?php

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
$app = new Emberfuse\Base\Application(
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
$kernel = new Emberfuse\Base\Kernel($app);

/*
 * Handle/Capture an incoming HTTP request.
 *
 * @var \Symfony\Component\HttpFoundation\Response
 */
$response = $kernel->handle(
    Symfony\Component\HttpFoundation\Request::createFromGlobals()
);

/*
 * Send the appropriate response.
 */
$response->send();
