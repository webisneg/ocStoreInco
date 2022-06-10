<?php
// Version
define('VERSION', '4.0.0.0b');
define('VERSION_CORE', 'ocStore');
define('VERSION_BUILD', '0001');

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Install
if (!defined('DIR_APPLICATION')) {
	header('Location: ../install/index.php');
	exit();
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');
