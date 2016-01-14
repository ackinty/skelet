<?php
namespace App\Aleat;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class AleatController extends \App\BaseController
{
    public function index(Request $request, Response $response, $args)
    {
        $this->logger->info("Aleat page index");

        $this->view->render($response, 'aleat/index.twig');
        return $response;
    }
}
