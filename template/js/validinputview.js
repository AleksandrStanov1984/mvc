$(document).ready(function() {
    $('#first_form').submit(function(e) {
        e.preventDefault();
        let name_user = $('#name_user').val();
        let comment = $('#comment').val();

        $(".error").remove();

        if (name_user.length< 1) {
            $('#name_user').after('<span class="error">This field is required</span>');
        }
        if (comment.length< 1) {
            $('#comment').after('<span class="error">This field is required</span>');
        }
    });
});