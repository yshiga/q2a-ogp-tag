<?php

/*
	Plugin Name: OGP TAG
	Plugin URI:
	Plugin Description: Set OGP TAGs in Question Page
	Plugin Version: 1.0
	Plugin Date: 2016-07-18
	Plugin Author: 38qa.net
	Plugin Author URI: http://38qa.net/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI:
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

// layer
qa_register_plugin_layer('qa-ogp-tag-layer.php','OGP TAG Layer');
