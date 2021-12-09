jQuery(function ($) {
  $(document).ready(function () {
    $('.psy_loadmore').click(function () {
      var button = $(this),
        current_page = button.attr('data-current-page'),
        max_page = button.attr('data-max-page'),
        query = button.attr('data-query'),
        admin_url = button.attr('data-admin-url'),
        data = {
          action: 'loadmore',
          query: query,
          page: current_page,
        };

      var attr_category = button.attr('data-category');
      if (
        typeof attr_category !== typeof undefined &&
        attr_category !== false
      ) {
        var categorie = button.attr('data-category');
        data.categorie = categorie;
      }

      var attr_author = button.attr('data-author');
      if (typeof attr_author !== typeof undefined && attr_author !== false) {
        var author_id = button.attr('data-author');
        data.author_id = author_id;
      }

      $.ajax({
        url: admin_url, // AJAX handler
        data: data,
        type: 'POST',
        beforeSend: function (xhr) {
          button.text('Loading...'); // change the button text, you can also add a preloader image
        },
        success: function (data) {
          if (data) {
            button.text('More posts').prev().after(data); // insert new posts

            current_page++;
            button.attr('data-current-page', current_page);

            if (current_page == max_page) {
              button.remove(); // if last page, remove the button
            }

            // you can also fire the "post-load" event here if you use a plugin that requires it
            // $( document.body ).trigger( 'post-load' );
          } else {
            button.remove(); // if no data, remove the button as well
          }
        },
      });
    });
  });
});
