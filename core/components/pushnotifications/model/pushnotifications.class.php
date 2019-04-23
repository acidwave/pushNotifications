<?php
if (!class_exists('WebPush')) {
    require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
}
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

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

    function sendPush($message, $uri = '') {
        $auth = array(
            'VAPID' => array(
                'subject' => 'me@acidwave.ru',
                'publicKey' => 'BDR5bfQCCcq5UZ8AKi8CYZE5mtrMgeHdlGHDwBuc_XL0OSjtwa6JgsNRLdNIAu7Gm9xBJmguwMrPvx5R2Ysof6g', 
                'privateKey' => 'FmPPuUCjiPa7Rs8W5MI2QOGEk2oeO-5PVK8QK2yT4EE',
            ),
        );
        $webPush = new WebPush($auth);
        $notification = [
            'title' => 'Учимся играя',
            'body' => $message,
            'icon' => '/assets/images/icons/android-chrome-192x192.png',
            'click_action' => (!empty($uri))? $uri : '/';
        ];
        $q = $this->modx->newQuery('pushNotificationsItem');
        if ($q->prepare() && $q->stmt->execute()) {
            while ($row = $q->stmt->fetch(PDO::FETCH_ASSOC)) {
                $arg = [
                    $row['pushNotificationsItem_endpoint'],
                    $row['pushNotificationsItem_publicKey'],
                    $row['pushNotificationsItem_authToken'],
                    $row['pushNotificationsItem_contentEncoding']
                ];
                $subscr = new Subscription($arg[0],$arg[1],$arg[2],$arg[3]);
                $webPush->sendNotification($subscr, json_encode($notification));
            }
            foreach ($webPush->flush() as $report) {
                $endpoint = $report->getRequest()->getUri()->__toString();
                if ($report->isSuccess()) {
                    $this->modx->log(modX::MODX_LOG_LEVEL_INFO, "[v] Message sent successfully for subscription {$endpoint}.");
                } else {
                    $this->modx->log(modX::MODX_LOG_LEVEL_ERROR, "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}");
                }
            }

        }
    }
}