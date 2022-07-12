function load_employee(search_key, response_container_id) {
    $.ajax({
        url: BASE_URL + 'php/live_search.php',
        method: "POST",
        dateType: 'json',
        data: { search_key: search_key },
        success: function (data) {
            $("#" + response_container_id).html(data);
        },
    });
}


function create_team(form_id) {
    var form = $('#' + form_id);
    var response_container = $("#" + form_id + "_error");
    $("#" + form_id).submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: BASE_URL + 'php/team.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.is_error == 0) {
                    form[0].reset();
                    showMessage(response_container, 'success', response.message)
                } else {
                    showMessage(response_container, 'error', response.message)
                }
            },
            error: function (error) {
                showMessage(response_container, 'error', error)
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
}


function showMessage(response_container, type, msg) {
    response_container.html(msg);
    if (type == "error") {
        response_container.attr('class', 'alert alert-danger');
    } else {
        response_container.attr('class', 'alert alert-success');
    }
}
