function load_employee(search_key, response_container_id) {
    $.ajax({
        url: BASE_URL + 'php/live_search.php',
        method: "POST",
        dateType: 'json',
        data: {
            data: { search_key: search_key }
        },
        success: function (data) {
            $("#" + response_container_id).html(data);
        },
    });
}