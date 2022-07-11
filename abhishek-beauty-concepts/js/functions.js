function loadCity(store_id) {
    var apiURL = 'http://localhost/API/api.php?store_id=' + store_id;
    var htmlString = '<option value="">City</option>';
    $('#city').html(htmlString);
    $.ajax({
        type: "GET",
        url: apiURL,
        dataType: "json",
        success: function (response) {        
            $.each(response.cityList, function (i, obj) {
                htmlString += "<option value=" + obj.city_id + ">" + obj.city_name + "</option>";
            });     
            $('#city').html(htmlString);      
        }
    });
   
}