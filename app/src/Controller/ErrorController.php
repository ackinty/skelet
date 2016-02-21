<?php
namespace App\Controller;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;

use \Illuminate \Database\Capsule\Manager as DB;

final class ErrorController extends ScentekController
{
    public function get404($container)
    {
        $this->logger->info("Error 404");

        return function ($request, $response) use ($container) {
            $this->view->render($response, 'error404.twig', []);
            return $response->withStatus(404);
        };
    }
}
