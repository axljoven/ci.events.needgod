// ========================================================
// Event Registration Form
// ========================================================
//

function generate_email_per_event_key(epe_input, email_input) {
      // Get event id and value of email
      let event_id = $('input[name="event_id"]').val();
      let email_value = $.trim($(email_input).val().toLowerCase());

      // Combine the value of email_per_event and email
      let generated_value = event_id + '_' + email_value;

      // Add the generated value to the hidden email_per_event input
      $(epe_input).val(generated_value);
}

// --------------------------------------------------------
// Initialize
// --------------------------------------------------------
// On document ready and email input change:
// - Get email value and add it to 'email_per_event' input field

$(document).ready(function () {
      let email_input = $('.event-registration-form form input[name="email"]');
      let epe_input = $('.event-registration-form form #email_per_event');
      
      generate_email_per_event_key(epe_input, email_input);

      $(email_input).on('input propertychange paste', function() {
            generate_email_per_event_key(epe_input, email_input);
      })
});
