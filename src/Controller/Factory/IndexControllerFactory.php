<?php

namespace Pacificnm\Media\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Media\Controller\IndexController;

class IndexControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Media\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Media\Service\ServiceInterface');

        return new IndexController($service);
    }


}

