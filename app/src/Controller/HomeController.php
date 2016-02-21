<?php
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeController extends \App\BaseController
{
    public function index(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page index");

        $this->view->render($response, 'home/index.twig');
        return $response;
    }
}
