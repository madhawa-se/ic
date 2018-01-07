var drop;
$(document).ready(function () {
    extendJ();
    formHandle();
    var model = $(".form-model");
    $(".model-trigger").on('click', function () {
        var prefix = 'true';
        var modelBtn = $(this);
        drop = modelBtn.parent('td').find('select');
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
        }
    });
}

function formHandle() {
    // this is the id of the form

    $('.modal-body').on('submit', '#ajax-form', (function (e) {
        var form = $("#ajax-form");
        var url = form.attr('action'); // the script where you handle the form input.

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (data)
            {
                replaceDrop(data.dropdown);
                var model = $(".form-model");
                model.modal('hide');
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    }));
}

function replaceDrop(newDrop) {
    var attributes = drop.prop("attributes");
    var newSelect = drop.replaceWithPush(newDrop);
    $.each(attributes, function () {
        newSelect.attr(this.name, this.value);
    });

}

function extendJ() {
    $.fn.replaceWithPush = function (a) {
        var $a = $(a);

        this.replaceWith($a);
        return $a;
    };
}