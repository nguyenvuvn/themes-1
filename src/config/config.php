<?php

return [

	'default' => 'default',

	'path' => base_path('resources/themes'),

	'cache' => [
		'enabled'  => false,
		'key'      => 'pingpong.themes',
		'lifetime' => 86400,
	],

	'bower' => [
		'binary_path' => '/vendor/bin',
		'is_active'   => false
	],

];
