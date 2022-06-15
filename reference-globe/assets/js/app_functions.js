function login(form_id, response_container_id) {
    var formData = $('#' + form_id).serializeArray();
    $.ajax({
        url: API_BASE_URL + '?action=login',
        type: 'POST',
        data: formData,
        success: function (response) {
            if (response.is_error == 0) {
                window.location.href = BASE_URL + 'app/dashboard.php';
            } else {
                $("#" + response_container_id).text(response.message);
            }
        },
        error: function (error) {
            $("#" + response_container_id).text(error);
        }
    });
}

function register(form_id, response_container_id) {
    var form = $('#' + form_id);
    var formData = form.serializeArray();
    $.ajax({
        url: API_BASE_URL + '?action=register',
        type: 'POST',
        data: formData,
        success: function (response) {
            $("#" + response_container_id).text(response.message);
            if (response.is_error == 0) {
                form[0].reset();
            }
        },
        error: function (error) {
            $("#" + response_container_id).text(error);
        }
    });
}

