<?php

namespace Pacificnm\Media\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Media\Controller\ViewController;

class ViewControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Media\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Media\Service\ServiceInterface');

        return new ViewController($service);
    }


}

