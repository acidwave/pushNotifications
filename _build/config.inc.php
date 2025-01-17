<?php
define('MODX_CORE_PATH', '/home/acidwave/sites/acidwave.ru/www/core/');

if (!defined('MODX_CORE_PATH')) {
    $path = dirname(__FILE__);
    while (!file_exists($path . '/core/config/config.inc.php') && (strlen($path) > 1)) {
        $path = dirname($path);
    }
    define('MODX_CORE_PATH', $path . '/core/');
}

return [
    'name' => 'pushNotifications',
    'name_lower' => 'pushnotifications',
    'version' => '1.0.3',
    'release' => 'beta',
    // Install package to site right after build
    'install' => false,
    // Which elements should be updated on package upgrade
    'update' => [
        'chunks' => false,
        'menus' => true,
        'plugins' => true,
        'resources' => false,
        'settings' => false,
        'snippets' => true,
        'templates' => false,
        'widgets' => false,
    ],
    // Which elements should be static by default
    'static' => [
        'plugins' => false,
        'snippets' => false,
        'chunks' => false,
    ],
    // Log settings
    'log_level' => !empty($_REQUEST['download']) ? 0 : 3,
    'log_target' => php_sapi_name() == 'cli' ? 'ECHO' : 'HTML',
    // Download transport.zip after build
    'download' => !empty($_REQUEST['download']),
];