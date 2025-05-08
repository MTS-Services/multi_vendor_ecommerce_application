
$(document).ready(function () {
    //Select 2
    $("select.form-control:not(.no-select)").select2();


    // Slug Generate
    $("#title").on("keyup", function () {
        const titleValue = $(this).val().trim();
        const slugValue = generateSlug(titleValue);
        $("#slug").val(slugValue);
    });
});
