<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Ims\Controller\Data' => 'Ims\Controller\DataController',
            'Ims\Controller\Login' => 'Ims\Controller\LoginController',
            'Ims\Controller\Applicant' => 'Ims\Controller\ApplicantController',
            'Ims\Controller\Register' => 'Ims\Controller\RegisterController',
            'Ims\Controller\Test' => 'Ims\Controller\TestController',
//            'Ims\Controller\User' => 'Ims\Controller\UserController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'data' => array(
                'type'    => 'Segment',
                    'options' => array(
                    'route' => '/data[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Ims\Controller',
                        'controller' => 'Data',
                        'action'     => 'index',
                    ),
                        'constraints' => array(
                        'action' => '^|login|new_user|add|edit|delete|apply|$',
                        'id'     => '[0-9]+',
                    ),
                ),
            ),
            'login' => array(
                'type'    => 'Segment',
                    'options' => array(
                    'route' => '/login[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Ims\Controller',
                        'controller' => 'login',
                        'action'     => 'index',
                    ),
                        'constraints' => array(
                        'action' => '^|login|new_user|add|edit|delete|apply|$',
                        'id'     => '[0-9]+',
                    ),
                ),
            ),
            'applicant' => array(
                'type'    => 'Segment',
                    'options' => array(
                    'route' => '/applicant[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Ims\Controller',
                        'controller' => 'applicant',
                        'action'     => 'index',
                    ),
//                        'constraints' => array(
//                        'action' => '^|login|register|change-email|userdetails|$',
//                        'id'     => '[0-9]+',
//                    ),
                ),
            ),
            'register' => array(
                'type'    => 'Segment',
                    'options' => array(
                    'route' => '/register[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Ims\Controller',
                        'controller' => 'register',
                        'action'     => 'index',
                    ),
                ),
            ),
            'user' => array(
                'type'    => 'Segment',
                    'options' => array(
                    'route' => '/user[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => '..\vendor\ZfcUser\src\ZfcUser\Controller',
                        'controller' => 'user',
                        'action'     => 'index',
                    ),
                        'constraints' => array(
                        'action' => '^|login|register|change-email|userdetails|test|$',
                        'id'     => '[0-9]+',
                    ),
                ),
//                'may_terminate' => true,
//                'child_routes' => array(
//                    
//                ),
            ),
            'test' => array(
                'type'    => 'Segment',
                    'options' => array(
                    'route' => '/test[/:action[/:id]]',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Ims\Controller',
                        'controller' => 'test',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager'=>array(
        'template_path_stack'=>array(
            'Ims'=>__DIR__ . '/../view',
            'zfcuser' => __DIR__ . '/../view',      //for overriding the default files in zfcuser view
//            __DIR__ . '/../view/layout'     //for module specific layout.
            ),
        //Overriding the default layout
            'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            ),
            /*For ajax call*/
            'strategies' => array(
                'ViewJsonStrategy'
            )
        )
    );