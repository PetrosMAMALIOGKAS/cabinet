jQuery(function ($) {
  $(document).ready(function () {
    var header = $('.header');

    // add shadow when scroll not on top of the page
    // $(window).scroll(function(e){
    //     if(header.offset().top !== 0){
    //         if(!header.hasClass('shadow')){
    //             header.addClass('shadow');
    //         }
    //     }else{
    //         header.removeClass('shadow');
    //     }
    // });

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

    $('.presentation-therapy .button').hover(
      function () {
        $('.presentation-therapy .button a').css({ color: '#ffffff' });
      },
      function () {
        $('.presentation-therapy .button a').css({ color: '#000000' });
      }
    );
  });
});

function validateRendezVousForm() {
  var exist_error = false;
  var rendez_vous_name =
    document.forms['rendezVousForm']['rendez_vous_name'].value;
  var rendez_vous_email =
    document.forms['rendezVousForm']['rendez_vous_email'].value;
  var rendez_vous_phone =
    document.forms['rendezVousForm']['rendez_vous_phone'].value;
  var error_name = document.getElementById('rendez-vous-error-name');
  var error_email = document.getElementById('rendez-vous-error-email');
  var error_phone = document.getElementById('rendez-vous-error-phone');

  if (rendez_vous_name == '') {
    exist_error = true;
    error_name.innerHTML = '* Name must be filled out';
  } else {
    error_name.innerHTML = '';
  }

  if (rendez_vous_email == '') {
    exist_error = true;
    error_email.innerHTML = '* Email must be filled out';
  } else {
    error_email.innerHTML = '';
  }

  if (rendez_vous_phone == '') {
    exist_error = true;
    error_phone.innerHTML = '* Phone must be filled out';
  } else if (!phonenumber(rendez_vous_phone)) {
    exist_error = true;
    error_phone.innerHTML = '* Phone not valid';
  } else {
    error_phone.innerHTML = '';
  }

  if (exist_error) {
    return false;
  }
}

function phonenumber(inputtxt) {
  var phoneno =
    /^\(?[0]?([1-9]{1})\)?[-. ]?([1-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{3})$/;
  if (inputtxt.match(phoneno)) {
    return true;
  } else {
    return false;
  }
}
