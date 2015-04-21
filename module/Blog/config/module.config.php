<?php
// Filename: /module/Blog/config/module.config.php
return array(

	'service_manager' => array(
		'invokables' => array(
			'Blog\Service\PostServiceInterface' => 'Blog\Service\PostService'
		)
	),


	// 'controllers' => array(
	// 	'invokables' => array(
	// 		'Blog\Controller\List' => 'Blog\Controller\ListController'
	// 	)
	// ),
	'controllers' => array(
		'factories' => array(
			'Blog\Controller\List' => 'Blog\Factory\ListControllerFactory'
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