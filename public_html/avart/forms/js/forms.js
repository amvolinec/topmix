$(document).ready(function () {

    $('#add-field').click(function () {
        let line = '<div class="col-md-12 form-line"><div class="row">' + $('#form-line').html() + '</div></div>';
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

    $('input#model').change(function () {
        let model = $('#model').val()
        console.log(model)
        axios
            .post('/av-panel/get-plural/', {model: model})
            .then(function (response) {
                $('#name').val(response.data.plural);
                $('#route').val(response.data.route);
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    });

    // field-name
    $(document).on('change', '#field-name', function () {
        console.log($(this).val());
        let title = $(this).closest('.form-line').find('#field-title');
        title.val($(this).val().capitalize());
    });
});

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1)
}
