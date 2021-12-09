jQuery(document).ready(function () {
  /*  <accordion scripts>   */
  var items = document.getElementsByClassName('button-element');

  jQuery('span.icon').click(function () {
    jQuery(this).toggleClass('active-icon');

    /* remove the styling from FAQ button except the button clicked */
    jQuery('span.icon')
      .not(this)
      .each(function () {
        jQuery(this).removeClass('active-icon');
      });
  });

  function toggleAccordion() {
    const itemToggle = this.getAttribute('aria-expanded');

    for (i = 0; i < items.length; i++) {
      items[i].setAttribute('aria-expanded', 'false');
    }

    if (itemToggle == 'false') {
      this.setAttribute('aria-expanded', 'true');

      // koita auto
      //  var span_icon_element = jQuery(this)
      //  .children('.icon')
      // .toggleClass('flyabve');

      //console.log(jQuery(this).children('.icon'));
      //span_icon_element.classList.toggle('flyabve');
    }
  }
  for (let item of items) {
    item.addEventListener('click', toggleAccordion);
  }
});
/*  </accordion scripts>   */

function validateQuestionForm() {
  var exist_error = false;
  var question_name = document.forms['questionForm']['question_name'].value;
  var question_email = document.forms['questionForm']['question-email'].value;
  var question_message =
    document.forms['questionForm']['question_message'].value;
  var error_name = document.getElementById('error-name');
  var error_email = document.getElementById('error-email');
  var error_question = document.getElementById('error-question');

  if (question_name == '') {
    exist_error = true;
    error_name.innerHTML = '* Name must be filled out';
  } else {
    error_name.innerHTML = '';
  }

  if (question_email == '') {
    exist_error = true;
    error_email.innerHTML = '* Email must be filled out';
  } else {
    error_email.innerHTML = '';
  }

  if (question_message == '') {
    exist_error = true;
    error_question.innerHTML = '* Question must be filled out';
  } else {
    error_question.innerHTML = '';
  }

  if (exist_error) {
    return false;
  }
}
