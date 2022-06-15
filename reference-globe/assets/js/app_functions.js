function get_users(response_container_id) {
    var valueOfTextBox = $("#result").val();
    var valueOfSelectedCheckbox = $("#radio:checked").val();

    $.ajax({
        url: API_BASE_URL + 'asas?action=get_users',
        type: 'GET',         
        success: function (response) {         
            $("#"+response_container_id).text(JSON.stringify(response.data));
        },
        error: function (xhr, status, error) {
            $("#"+response_container_id).text(error);
        }
    });
}