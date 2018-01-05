$(document).ready(function () {

    formHandle();
    var model = $(".form-model");
    $(".model-trigger").on('click', function () {
        var prefix = 'true';
        var modelBtn = $(this);
        var formTarget = modelBtn.data('form_target');
        model.modal('show');
        var modelContent = model.find(".modal-body");
        ajaxView(formTarget, modelContent);
    });
});


function ajaxView(controller, target) {
    $.ajax({
        type: "GET",
        url: base_url + controller + "/true",
        success: function (data) {
            target.html(data);
            //formHandle();
        }
    });
}

function formHandle() {
    // this is the id of the form
    
    $('.modal-body').on('submit','#ajax-form',(function (e) {
        var form = $("#ajax-form");
        var url = form.attr('action'); // the script where you handle the form input.

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data)
            {
                alert(data); // show response from the php script.
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    }));
}