<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var pushNotifications $pushNotifications */
$pushNotifications = $modx->getService('pushNotifications', 'pushNotifications', MODX_CORE_PATH . 'components/pushnotifications/model/', $scriptProperties);
if (!$pushNotifications) {
    return 'Could not load pushNotifications class!';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption('tpl', $scriptProperties, 'Item');
$sortby = $modx->getOption('sortby', $scriptProperties, 'name');
$sortdir = $modx->getOption('sortbir', $scriptProperties, 'ASC');
$limit = $modx->getOption('limit', $scriptProperties, 5);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

// Build query
$c = $modx->newQuery('pushNotificationsItem');
$c->sortby($sortby, $sortdir);
$c->where(['active' => 1]);
$c->limit($limit);
$items = $modx->getIterator('pushNotificationsItem', $c);

// Iterate through items
$list = [];
/** @var pushNotificationsItem $item */
foreach ($items as $item) {
    $list[] = $modx->getChunk($tpl, $item->toArray());
}

// Output
$output = implode($outputSeparator, $list);
if (!empty($toPlaceholder)) {
    // If using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);

    return '';
}
// By default just return output
return $output;
