<?php

namespace Pacificnm\Media;

class Module
{

    public function getConsoleUsage()
    {
        return array();
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/pacificnm.media.global.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/'
                ),
            ),
        );
    }


}

