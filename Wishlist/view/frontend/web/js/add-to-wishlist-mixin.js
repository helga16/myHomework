define(
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'Magento_Customer/js/customer-data',
    ],
    function ($, modal, customerData) {
        'use strict';

        return function (addToWishlist) {
            $.widget('mage.addToWishlist', addToWishlist, {
                bindFormSubmit: function (form) {

                    var self = this;

                    if (customerData.get('customer')().firstname) {

                        var options = {
                            type: 'popup',
                            title: $.mage.__('Do you want to subscribe'),
                            modalClass: 'event-popup',
                            responsive: true,
                            buttons: [{
                                text: $.mage.__('Yes'),
                                click: function () {
                                    let _self = this;
                                    $.ajax({
                                        url: BASE_URL + 'wishlist/index/index',   //TODO need change
                                        data: {},
                                        type: "POST",
                                        dataType: 'json'
                                    }).done(function (response) {
                                        _self.closeModal();
                                        self.ajaxSubmit(form);
                                    }).fail(function (error) {
                                        console.log(JSON.stringify(error));
                                    });
                                }
                            }, {
                                text: $.mage.__("No, I don't"),
                                click: function () {
                                    this.closeModal();
                                    self.ajaxSubmit(form);
                                }
                            }]
                        };

                        // TODO Refactoring hardcode
                        $("#popup-modal").modal(options).modal("openModal");
                    } else {
                        this._super(form);
                    }
                }
            })
        }
    });

