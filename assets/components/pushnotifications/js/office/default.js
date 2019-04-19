Ext.onReady(function () {
    pushNotifications.config.connector_url = OfficeConfig.actionUrl;

    var grid = new pushNotifications.panel.Home();
    grid.render('office-pushnotifications-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});