<?php
declare(strict_types=1);

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController extends AbstractFOSRestController
{
    /**
     * @Get("/login", name="login")
     */
    public function getHealthCheck()
    {
        return new JsonResponse([
            'status' => "Response OK !!!!",
            'code' => 'ok'
        ]);
    }
}
