define([
    'uiComponent',
    'jquery','ko',
    'mage/url',
],function (uiComponent,$,ko,urlBuilder) {
    'use strict';
    return uiComponent.extend({
        getMyText: function () {

return 'this works';
       },

        buttonClick: function () {
            var serviceUrl = urlBuilder.build(this.url);

            var valueMy = $("#inpMy").val();
            var divMy = $("#divMy").html();

console.log('hello olga');
            console.log(this.age);

          $.ajax({
                url: serviceUrl,   //TODO need change
                data: {name:valueMy},
                type: "POST",
                dataType: 'json'
            }).done(function (response) {
                console.log('success');

                var valueAj = $("#divMy").html();
              $("#divMy").html(JSON.stringify(response)).show();
            }).fail(function (error) {
                console.log(JSON.stringify(error));
            });
        }

    });
});
