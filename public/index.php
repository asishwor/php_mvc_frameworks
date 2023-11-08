<?php 
require_once __DIR__ . '/../vendor/autoload.php';

use app\controller\SiteController;
use app\core\Application;

$app = new Application( dirname( __DIR__ ));
$siteController = new SiteController();

$app->router->get('/', [ $siteController, 'home' ]);

$app->router->get('/contact', [ $siteController, 'contact' ]);
$app->router->post('/contact', [ $siteController, 'contactHandle' ]);

$app->router->get(
    '/about',
    function () 
    {
        return 'About';
    }
);
$app->run();

