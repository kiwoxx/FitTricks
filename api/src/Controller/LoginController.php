<?php
declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController extends AbstractFOSRestController
{
    /**
     * @Get("/home", name="home")
     */
    public function getHome()
    {
        return new JsonResponse([
            'status' => "Response OK !!!!",
            'code' => 'ok'
        ]);
    }

    /**
     * @Rest\Get("/login", name="login")
     */
    public function index()
    {
        $this->getConnection()->executeQuery('
            CREATE TABLE user
            (
                id INT PRIMARY KEY AUTO INCREMENT,
                name VARCHAR(255),
                password VARCHAR(255)
            )'
        );

        return new JsonResponse([
            'status' => "CONNECTED",
        ]);
    }

    function getConnection()
    {

        $paths = array("/api/src/Entity");

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'lulu',
            'dbname'   => 'fittricks',
        );

        $config = ORMSetup::createAnnotationMetadataConfiguration($paths, true);
        return EntityManager::create($dbParams, $config)->getConnection();
    }
}
