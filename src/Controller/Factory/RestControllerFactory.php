<?php

namespace Pacificnm\Media\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Media\Controller\RestController;

class RestControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Media\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Media\Service\ServiceInterface');

        return new RestController($service);
    }


}

