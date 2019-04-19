pushNotifications.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'pushnotifications-panel-home',
            renderTo: 'pushnotifications-panel-home-div'
        }]
    });
    pushNotifications.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(pushNotifications.page.Home, MODx.Component);
Ext.reg('pushnotifications-page-home', pushNotifications.page.Home);