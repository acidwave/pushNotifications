<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var pushNotifications $pushNotifications */
$pushNotifications = $modx->getService('pushNotifications', 'pushNotifications', MODX_CORE_PATH . 'components/pushnotifications/model/');
$modx->lexicon->load('pushnotifications:default');

// handle request
$corePath = $modx->getOption('pushnotifications_core_path', null, $modx->getOption('core_path') . 'components/pushnotifications/');
$path = $modx->getOption('processorsPath', $pushNotifications->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);