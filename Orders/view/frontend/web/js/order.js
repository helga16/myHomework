define([
    'uiComponent',
    'jquery','ko',
    'mage/url',
],function (uiComponent,$,ko,urlBuilder) {
        'use strict';
        return uiComponent.extend({
            buttonClick: function () {
            var serviceUrl = urlBuilder.build(this.url);

            var inputValue = $("#inpMy").val();
            var divMy = $("#divMy").html();
            $.ajax({
                url: serviceUrl,
                data: {name:inputValue},
                type: "POST",
                dataType: 'json'
            }).done(function (response) {
              $("#divMy").html(JSON.stringify(response)).show();
            }).fail(function (error) {
                console.log(JSON.stringify(error));
            });
        }

    });
});
