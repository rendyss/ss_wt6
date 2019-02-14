jQuery(function () {
    var $ = jQuery.noConflict();

    // $(".iss6").autocomplete({
    //     source: function (request, response) {
    //         $.ajax({
    //             // url: objjs.ajax_url,
    //             url: 'http://gd.geobytes.com/AutoCompleteCity',
    //             dataType: "jsonp",
    //             data: {
    //                 action: 'autocomple_search',
    //                 q: request.term
    //             },
    //             success: function (data) {
    //                 response(data);
    //             }
    //         });
    //     },
    //     minLength: 3,
    //     select: function (event, ui) {
    //         console.log(ui.item ? "Selected: " + ui.item.label : "Nothing selected, input was " + this.value);
    //     },
    //     open: function () {
    //         $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
    //     },
    //     close: function () {
    //         $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
    //     }
    // });

    $(".iss6").autocomplete({
        source: function (req, response) {
            $.getJSON(objjs.ajax_url + '?callback=?&action=autocomple_search', req, response);
        },
        select: function (event, ui) {
            $(this).val(ui)
        },
        minLength: 3
    })
});

