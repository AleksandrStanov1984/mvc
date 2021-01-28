$(document).ready(function() {
    $('#first_form').submit(function(e) {
        e.preventDefault();
        let name_product = $('#name_product').val();
        let name_user = $('#name_user').val();

        $(".error").remove();

        if (name_product.length< 1) {
            $('#name_product').after('<span class="error">This field is required</span>');
        }
        if (name_user.length< 1) {
            $('#name_user').after('<span class="error">This field is required</span>');
        }
    });
});