
$(document).ready(function() {
      // let forms = $('.edit-event-form > textarea#details');
      let forms = $('textarea');
      console.log(forms);
      
      tinymce.init({
      	selector: '.edit-event-form .tinymce'
      });
})