<script>
    var BASE_URL = '<?php echo BASE_URL; ?>';
    var UPLOAD_PATH = "<?php echo UPLOAD_PATH; ?>";
    var UPLOAD_URL = '<?php echo UPLOAD_URL; ?>';
    var API_BASE_URL = '<?php echo API_BASE_URL; ?>';

    function login(form_id) {
        var formData = $('#' + form_id).serializeArray();
        var response_container = $("#" + form_id + "_error");
        $.ajax({
            url: API_BASE_URL + '?action=login',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.is_error == 0) {
                    window.location.href = BASE_URL + 'app/dashboard.php';
                } else {
                    showMessage(response_container, 'error', response.message)
                }
            },
            error: function(error) {
                $("#" + response_container_id).text(error);
                showMessage(response_container, 'error', response.message)
            }
        });
    }

    function register(form_id) {
        var form = $('#' + form_id);
        var response_container = $("#" + form_id + "_error");
        $("#" + form_id).submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: API_BASE_URL + '?action=register',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.is_error == 0) {
                        form[0].reset();
                        showMessage(response_container, 'success', response.message)
                    } else {
                        showMessage(response_container, 'error', response.message)
                    }
                },
                error: function(error) {
                    showMessage(response_container, 'error', error)
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    }

    function addUser(form_id) {
        var form = $('#' + form_id);
        var response_container = $("#" + form_id + "_error");
        $("#" + form_id).submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: API_BASE_URL + '?action=add_user',
                type: form.attr('method'),
                data: formData,
                success: function(response) {
                    if (response.is_error == 0) {
                        form[0].reset();
                        window.location.href = BASE_URL + 'app/user/index.php?msg=' + response.message;
                    } else {
                        showMessage(response_container, 'error', response.message)
                    }
                },
                error: function(error) {
                    showMessage(response_container, 'error', error)
                },
                async: false,
                cache: false,
                processData: false,
                contentType: false,
            });
        });
    }


    function updateUser(form_id) {
        var form = $('#' + form_id);
        var response_container = $("#" + form_id + "_error");
        $("#" + form_id).submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: API_BASE_URL + '?action=update_user',
                type: form.attr('method'),
                data: formData,
                success: function(response) {
                    if (response.is_error == 0) {
                        form[0].reset();
                        window.location.href = BASE_URL + 'app/user/index.php?msg=' + response.message;
                    } else {
                        showMessage(response_container, 'error', response.message)
                    }
                },
                error: function(error) {
                    showMessage(response_container, 'error', error)
                },
                async: false,
                cache: false,
                processData: false,
                contentType: false,
            });
        });
    }


    function deleteUser(delete_id) {

        $.ajax({
            url: API_BASE_URL + '?action=user_delete&delete_id=' + delete_id,
            type: 'GET',
            success: function(response) {
                if (response.is_error == 0) {
                    window.location.href = BASE_URL + 'app/user/index.php?msg=' + response.message;
                }
            },
            error: function(error) {
                window.location.href = BASE_URL + 'app/user/index.php?msg=' + error;
            },
            async: false,
            cache: false,
            processData: false,
            contentType: false,
        });
    }


    //---------------Employee----------

    function addEmp(form_id) {
        var form = $('#' + form_id);
        var response_container = $("#" + form_id + "_error");
        $("#" + form_id).submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: API_BASE_URL + '?action=add_emp',
                type: form.attr('method'),
                data: formData,
                success: function(response) {
                    if (response.is_error == 0) {
                        form[0].reset();
                        window.location.href = BASE_URL + 'app/employee/index.php?msg=' + response.message;
                    } else {
                        showMessage(response_container, 'error', response.message)
                    }
                },
                error: function(error) {
                    showMessage(response_container, 'error', error)
                },
                async: false,
                cache: false,
                processData: false,
                contentType: false,
            });
        });
    }


    function updateEmp(form_id) {
        var form = $('#' + form_id);
        var response_container = $("#" + form_id + "_error");
        $("#" + form_id).submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: API_BASE_URL + '?action=update_emp',
                type: form.attr('method'),
                data: formData,
                success: function(response) {
                    if (response.is_error == 0) {
                        form[0].reset();
                        window.location.href = BASE_URL + 'app/employee/index.php?msg=' + response.message;
                    } else {
                        showMessage(response_container, 'error', response.message)
                    }
                },
                error: function(error) {
                    showMessage(response_container, 'error', error)
                },
                async: false,
                cache: false,
                processData: false,
                contentType: false,
            });
        });
    }


    function deleteEmp(delete_id) {

        $.ajax({
            url: API_BASE_URL + '?action=emp_delete&delete_id=' + delete_id,
            type: 'GET',
            success: function(response) {
                if (response.is_error == 0) {
                    window.location.href = BASE_URL + 'app/employee/index.php?msg=' + response.message;
                }
            },
            error: function(error) {
                window.location.href = BASE_URL + 'app/employee/index.php?msg=' + error;
            },
            async: false,
            cache: false,
            processData: false,
            contentType: false,
        });
    }

    //-----common function

    function showMessage(response_container, type, msg) {
        response_container.text(msg);
        if (type == "error") {
            response_container.attr('class', 'alert alert-danger');
        } else {
            response_container.attr('class', 'alert alert-success');
        }
    }
</script>