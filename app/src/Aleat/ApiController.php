<?php
namespace App\Aleat;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ApiController indexextends \App\BaseController
{
    public function aleatList(Request $request, Response $response, $args)
    {
        $this->logger->info("Aleat page index");

        $this->view->render($response, 'aleat/index.twig');
        return $response;
    }
}
