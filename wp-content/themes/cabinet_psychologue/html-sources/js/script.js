var header = $('.header');

$(window).scroll(function (e) {
  if (header.offset().top !== 0) {
    if (!header.hasClass('shadow')) {
      header.addClass('shadow');
    }
  } else {
    header.removeClass('shadow');
  }
});

$(document).ready(function () {
  // le menu mobile
  $('.hamburger-icon-wrapper').click(function () {
    if ($(this).hasClass('ouvert')) {
      $('.menu-mobile').fadeOut();
      $(this).removeClass('ouvert');
    } else {
      $('.menu-mobile').fadeIn();
      $(this).addClass('ouvert');
    }
  });

  //    close menu when click outside it
  $(document).click(function (event) {
    var $target = $(event.target);
    if (
      !$target.closest('.picto-burger').length &&
      $('.picto-burger').hasClass('ouvert')
    ) {
      var el = document.getElementsByClassName('picto-burger')[0];
      $(el).removeClass('ouvert');
      $('.menu-mobile').fadeOut();
    }
  });
});
