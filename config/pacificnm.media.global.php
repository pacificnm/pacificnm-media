<?php 
return array(
    'module' => array(
        'Media' => array(
            'name' => 'Media',
            'version' => '1.0.0',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/media.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\Media\Controller\ConsoleController' => 'Pacificnm\Media\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\Media\Controller\CreateController' => 'Pacificnm\Media\Controller\Factory\CreateControllerFactory',
            'Pacificnm\Media\Controller\DeleteController' => 'Pacificnm\Media\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\Media\Controller\IndexController' => 'Pacificnm\Media\Controller\Factory\IndexControllerFactory',
            'Pacificnm\Media\Controller\RestController' => 'Pacificnm\Media\Controller\Factory\RestControllerFactory',
            'Pacificnm\Media\Controller\UpdateController' => 'Pacificnm\Media\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\Media\Controller\ViewController' => 'Pacificnm\Media\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\Media\Service\ServiceInterface' => 'Pacificnm\Media\Service\Factory\ServiceFactory',
            'Pacificnm\Media\Mapper\MysqlMapperInterface' => 'Pacificnm\Media\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\Media\Form\Form' => 'Pacificnm\Media\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'media-create' => array(
                'pageTitle' => 'Media',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'media-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/media/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Media\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'media-delete' => array(
                'pageTitle' => 'Media',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'media-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/media/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Media\Controller\DeleteController',
                        'action' => 'index'
                    )
                )
            ),
            'media-index' => array(
                'pageTitle' => 'Media',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'media-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/media',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Media\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'media-rest' => array(
                'pageTitle' => 'Media',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'media-index',
                'icon' => 'fa fa-gear',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/media[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Media\Controller\RestController'
                    )
                )
            ),
            'media-update' => array(
                'pageTitle' => 'Media',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'media-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/media/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Media\Controller\UpdateController',
                        'action' => 'index'
                    )
                )
            ),
            'media-view' => array(
                'pageTitle' => 'Media',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'media-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/media/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Media\Controller\ViewController',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'media-console-index' => array(
                    'options' => array(
                        'route' => 'media',
                        'defaults' => array(
                            'controller' => 'Pacificnm\Media\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\Media' => true
        ),
        'template_map' => array(
            'pacificnm/media/create/index' => __DIR__ . '/../view/media/create/index.phtml',
            'pacificnm/media/delete/index' => __DIR__ . '/../view/media/delete/index.phtml',
            'pacificnm/media/index/index' => __DIR__ . '/../view/media/index/index.phtml',
            'pacificnm/media/update/index' => __DIR__ . '/../view/media/update/index.phtml',
            'pacificnm/media/view/index' => __DIR__ . '/../view/media/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'administrator' => array(
                'media-create',
                'media-delete',
                'media-index',
                'media-update',
                'media-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'key' => 'admin',
                'name' => 'Admin',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'active' => true,
                'location' => 'left',
                'items' => array(
                    array(
                        'key' => 'media-index',
                        'name' => 'Media',
                        'route' => 'media-index',
                        'icon' => 'fa fa-gear',
                        'order' => 100,
                        'active' => true
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Media',
                        'route' => 'media-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'media-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'media-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'media-delete',
                                        'useRouteMatch' => true,
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'media-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);