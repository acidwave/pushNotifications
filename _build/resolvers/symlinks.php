<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/pushNotifications/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/pushnotifications')) {
            $cache->deleteTree(
                $dev . 'assets/components/pushnotifications/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/pushnotifications/', $dev . 'assets/components/pushnotifications');
        }
        if (!is_link($dev . 'core/components/pushnotifications')) {
            $cache->deleteTree(
                $dev . 'core/components/pushnotifications/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/pushnotifications/', $dev . 'core/components/pushnotifications');
        }
    }
}

return true;