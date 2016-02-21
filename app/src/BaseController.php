<?php
namespace App;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BaseController
{

    protected $view;
    protected $logger;

    public function __construct(Twig $view, LoggerInterface $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    protected function error404($response, $message) {
        $this->view->render($response, 'error404.twig', [
            'message' => $message,
        ]);
        return $response ;
    }

}
