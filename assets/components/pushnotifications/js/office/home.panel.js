pushNotifications.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'pushnotifications-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: false,
            hideMode: 'offsets',
            items: [{
                title: _('pushnotifications_items'),
                layout: 'anchor',
                items: [{
                    html: _('pushnotifications_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'pushnotifications-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    pushNotifications.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(pushNotifications.panel.Home, MODx.Panel);
Ext.reg('pushnotifications-panel-home', pushNotifications.panel.Home);
