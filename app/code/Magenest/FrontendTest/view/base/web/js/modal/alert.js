require([
    'Magento_Ui/js/modal/alert'
], function(alert) {

    alert({
        title: $.mage.__('Some title'),
        content: $.mage.__('Some content'),
        actions: {
            always: function(){}
        }
    });

});