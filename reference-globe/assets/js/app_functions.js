function login(form_id, response_container_id) {
    var formData = $('#' + form_id).serializeArray();
    $.ajax({
        url: API_BASE_URL + '?action=login',
        type: 'POST',
        data: formData,
        success: function (response) {
            // $("#" + response_container_id).text(JSON.stringify(response.data));
            if (response.data.is_error==0) {
                window.location.href = BASE_URL + 'app/dashboard.php';              
            } else {
                $("#" + response_container_id).text(response.data.message);
            }
        },
        error: function (xhr, status, error) {
            $("#" + response_container_id).text(error);
        }
    });
}


function get_users(response_container_id) {
    var valueOfTextBox = $("#result").val();
    var valueOfSelectedCheckbox = $("#radio:checked").val();

    $.ajax({
        url: API_BASE_URL + '?action=get_users',
        type: 'GET',
        success: function (response) {
            $("#" + response_container_id).text(JSON.stringify(response.data));
        },
        error: function (xhr, status, error) {
            $("#" + response_container_id).text(error);
        }
    });
}