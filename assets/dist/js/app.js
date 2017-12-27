var base_url='http://localhost/icic/';

$(document).ready(function () {
    $(".model-trigger").on('click', function () {
        var model = $(this);
        var modelTarget = model.data('xtarget');
        var modelController = model.data('controller');
        $(modelTarget).modal('show');
        var modelContent=$(modelTarget).find(".modal-body");
        ajaxView(modelController,modelContent);
    });
});


function ajaxView(controller,target) {
    $.ajax({
        type: "GET",
        url: base_url+controller,
        success: function (data) {
            target.html(data);
        }
    });
}