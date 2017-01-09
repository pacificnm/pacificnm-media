<?php

namespace Pacificnm\Media\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Media\Controller\DeleteController;

class DeleteControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Media\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Media\Service\ServiceInterface');

        return new DeleteController($service);
    }


}

