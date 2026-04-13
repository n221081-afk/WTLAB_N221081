$(document).ready(function () {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl, { trigger: 'focus' });
  });

  $('#viewLabBtn').click(function () {
    $('html, body').animate({ scrollTop: $('#lab').offset().top - 70 }, 600);
  });

  $('#toggleAbout').click(function () {
    $('#about').toggleClass('d-none');
  });

  $('.project-detail-btn').click(function () {
    var title = $(this).data('title');
    var description = $(this).data('description');
    var img = $(this).data('img');
    $('#projectModalLabel').text(title);
    $('#projectModalText').text(description);
    $('#projectModalImg').attr('src', img);
  });

  $('#contactForm').on('submit', function (event) {
    event.preventDefault();
    var isValid = true;
    $(this).find('input, textarea, select').each(function () {
      if ($(this).prop('required') && !$(this).val()) {
        $(this).addClass('is-invalid').removeClass('is-valid');
        isValid = false;
      } else {
        $(this).addClass('is-valid').removeClass('is-invalid');
      }
    });

    if ($('input[name="contactRadio"]:checked').length === 0) {
      $('input[name="contactRadio"]').addClass('is-invalid');
      isValid = false;
    } else {
      $('input[name="contactRadio"]').removeClass('is-invalid').addClass('is-valid');
    }

    if (isValid) {
      $('#contactAlert').removeClass('d-none').text('Thank you! Your message has been submitted successfully.');
      setTimeout(function () {
        $('#contactAlert').addClass('d-none');
      }, 4000);
    }
  });

  $('#contactForm input, #contactForm textarea, #contactForm select').on('input change', function () {
    if ($(this).val()) {
      $(this).addClass('is-valid').removeClass('is-invalid');
    }
  });

  $('#contactForm').on('reset', function () {
    $(this).find('.is-valid, .is-invalid').removeClass('is-valid is-invalid');
  });

  $('#home').hover(
    function () {
      $(this).css('background-color', '#0b5ed7');
    },
    function () {
      $(this).css('background-color', '');
    }
  );
});
