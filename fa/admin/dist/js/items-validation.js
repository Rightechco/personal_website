$(document).ready(function() {
    $("#validation-form").validate({
        rules: {
            name: "required",
        },
        messages: {
            name: "این فیلد الزامی می باشد",
        }
    });
});