<?php

namespace Pacificnm\Media\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Media\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pacificnm\Media\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\Media\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

