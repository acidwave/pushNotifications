<?php

/**
 * The home manager controller for pushNotifications.
 *
 */
class pushNotificationsHomeManagerController extends modExtraManagerController
{
    /** @var pushNotifications $pushNotifications */
    public $pushNotifications;


    /**
     *
     */
    public function initialize()
    {
        $this->pushNotifications = $this->modx->getService('pushNotifications', 'pushNotifications', MODX_CORE_PATH . 'components/pushnotifications/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['pushnotifications:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('pushnotifications');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->pushNotifications->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->pushNotifications->config['jsUrl'] . 'mgr/pushnotifications.js');
        $this->addJavascript($this->pushNotifications->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->pushNotifications->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->pushNotifications->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->pushNotifications->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->pushNotifications->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->pushNotifications->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        pushNotifications.config = ' . json_encode($this->pushNotifications->config) . ';
        pushNotifications.config.connector_url = "' . $this->pushNotifications->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "pushnotifications-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="pushnotifications-panel-home-div"></div>';

        return '';
    }
}