$(document).ready(function () {

    $('#add-field').click(function () {
        let line = $('#form-line').html();
        $('#form-inner').append(line);
    });

    $('#store-fields').click(function () {
        $('#form-line').html('');
        $('form').submit();
    });

    $('input:checkbox').change(function () {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });
});
