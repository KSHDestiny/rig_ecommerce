$(document).ready( function () {
    feather.replace()

    $('.dropify').dropify({
        messages: {
            'default': 'Choose Your Upload Image',
            'replace': 'Click or Drag and Drop to Replace',
            'remove' : 'Remove',
        }
    });

    $('.statusToggle').bootstrapToggle();

    /* AJAX Setup */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    })
});
