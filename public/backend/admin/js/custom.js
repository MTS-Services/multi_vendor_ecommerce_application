//Select 2
$(document).ready(function () {
    $("select.form-control:not(.no-select)").select2();
});
// Slug Generator
function generateSlug(str) {
    return str
        .toLowerCase()
        .replace(/\s+/g, "-")
        .replace(/[^\w\u0980-\u09FF-]+/g, "") // Allow Bangla characters (\u0980-\u09FF)
        .replace(/--+/g, "-")
        .replace(/^-+|-+$/g, "");
}

$(document).ready(function () {
    $("#title").on("keyup", function () {
        const titleValue = $(this).val().trim();
        const slugValue = generateSlug(titleValue);
        $("#slug").val(slugValue);
    });
});
