<?php

namespace Pacificnm\Media\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Media\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Media\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }


}

