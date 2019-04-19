var pushNotifications = function (config) {
    config = config || {};
    pushNotifications.superclass.constructor.call(this, config);
};
Ext.extend(pushNotifications, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('pushnotifications', pushNotifications);

pushNotifications = new pushNotifications();