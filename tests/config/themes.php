<?php

return [

	'default' => 'default',

	'path' => base_path('themes'),

	'cache' => [
		'enabled'  => false,
		'key'      => 'pingpong.themes.for.testing',
		'lifetime' => 1,
	],

	'bower' => [
		'binary_path' => '/../vendor/bin',
		'is_active'   => true
	],

];
