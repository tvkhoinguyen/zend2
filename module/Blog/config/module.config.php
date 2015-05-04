<?php
// Filename: /module/Blog/config/module.config.php
return array(

	'db' => array(
		'driver' => 'Pdo' ,
		'username' => 'root' , //edit this
		'password' => '' , //edit this
		'dsn' => 'mysql:dbname=zend2;host=localhost' ,
		'driver_options' => array(
		\PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
		)
	),




	'service_manager' => array(
		// 'invokables' => array(
		// 	'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
		// )
		'factories' => array(
			// 'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory',
			'Blog\Mapper\PostMapperInterface' => 'Blog\Factory\ZendDbSqlMapperFactory' ,
			'Blog\Service\PostServiceInterface' => 'Blog\Factory\PostServiceFactory',
			'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
		)
	),


	// 'controllers' => array(
	// 	'invokables' => array(
	// 		'Blog\Controller\List' => 'Blog\Controller\ListController'
	// 	)
	// ),
	'controllers' => array(
		'invokables' => array(
			'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory',
		)
	),

	// This lines opens the configuration for the RouteManager
	'router' => array(
		// Open configuration for all possible routes
		'routes' => array(
			// Define a new route called "post"
			'blog' => array(
				// 'type' => 'literal' ,
				'type' => 'segment' ,
				'options' => array(
					'route' => '/blog[/:action][/:id]' ,
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Blog\Controller\List' ,
						'action' => 'index' ,
					)
				)
			)
		)
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'blog'=>__DIR__ . '/../view' ,
		),
	),
);
?>