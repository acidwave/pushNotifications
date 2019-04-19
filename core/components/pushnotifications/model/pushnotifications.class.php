<?php
if (!class_exists('WebPush')) {
    require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
}

class pushNotifications
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/pushnotifications/';
        $assetsUrl = MODX_ASSETS_URL . 'components/pushnotifications/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('pushnotifications', $this->config['modelPath']);
        $this->modx->lexicon->load('pushnotifications:default');
    }

}