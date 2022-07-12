<?php
require_once(dirname(__FILE__, 2) . '/partials/header_admin.php');
require_once('menu.php');
?>
<section class="home">
    <div>
        <span><a href="#"></a></span>
    </div>
    <button class="button">Create Team</button>
    <form method="POST" id="form1">
        <div class="text">
            <select name="project_id" id="project_id">
                <option value="">--Select--</option>
                <option value="1">Project 1</option>
                <option value="2">Project 2</option>
                <option value="3">Project 3</option>
            </select>
            <button class="button">ADD</button>
        </div>
        <div class="text-center" style="max-width:50%;">
            <div class="text-center mt-5 mb-4">
                <i class='bx bx-search icon'></i>
                <input type="text" onkeyup="load_employee(this.value,'search_result')" class="menu" id="live_search" autocomplete="off" placeholder="Search...">

                <div id="search_result"></div>
                <button class="button_create" onclick="create_team('form1')">Create</button>
                <div id="form1_error"></div>
            </div>

        </div>
    </form>
</section>


<script type="text/javascript">
    $(document).ready(function() {
        $("#live_search").keyup(function() {

        });
    });
</script>
<?php
require_once(dirname(__FILE__, 2) . '/partials/footer_admin.php');
?>