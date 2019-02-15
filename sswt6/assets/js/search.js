jQuery(function () {
    var $ = jQuery.noConflict();

    //Autocomplete
    $(".iss6").autocomplete({
        source: function (req, response) {
            $.getJSON(objjs.ajax_url + '?callback=?&action=autocomple_search', req, response);
        },
        select: function (event, ui) {
            $(this).val(ui)
        },
        minLength: 3
    });

    //function to generate results
    function search_posts(page, sender) {
        var query = $(sender).find('.iss6').val(),
            sresults_wrap = $(sender).find('.sresults');

        sresults_wrap.addClass('loading');
        $.ajax({
            url: objjs.ajax_url,
            type: 'GET',
            data: {
                'action': 'search_posts',
                'p': page,
                'q': query
            },
            dataType: 'json',
            success: function (data) {
                var content_html = '';
                $.each(data.items, function (x, y) {
                    content_html += y;
                });
                sresults_wrap.html(content_html);
                sresults_wrap.append(data.pagination);

                sresults_wrap.removeClass('loading');
            }
        })
    }

    //submit form for search
    $(".frm_sswt6").submit(function (e) {
        e.preventDefault();
        search_posts(1, $(this));
    });

    //pagination
    $('body').on('click', '.page-numbers li a', function (e) {
        e.preventDefault();

        var paged = $(this).html(),
            pagination_wrapper = $('.page-numbers'),
            current_page = pagination_wrapper.find('li span.current').html(),
            form_sender = $(this).closest('form');

        console.log(pagination_wrapper.html());

        //check if link is next or prev
        if ($(this).hasClass('prev')) {
            paged = parseInt(current_page, 10) - 1;
        } else if ($(this).hasClass('next')) {
            paged = parseInt(current_page, 10) + 1;
        }

        search_posts(paged, form_sender)
    });
});

