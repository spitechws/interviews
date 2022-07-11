<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="test.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> 
</head>  
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="amantya-logo.png"alt="">
                </span>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
            <h>Hi, <?php echo $_SESSION['name']; ?></h>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="admin_my_team.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">My Team</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin_User_name.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">My Appraisel</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="signout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Signout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>     
            </div>
        </div>
    </nav>
    <section class="home">
        <div>
        <span><a href="#"></a></span>
        </div>
        <button class="button">Create Team</button>
        <div class="text">
                <select name="dog-names" id="dog-names">
                <option value="Project">Project</option>
                <option value="Project 1">Project 1</option>
                <option value="Project 2">Project 2</option>
                <option value="Project 3">Project 3</option>
               </select> 
               <button class="button">ADD</button>
        </div>
            <div class="text-center" style ="max-width:50%;">
            <div class ="text-center mt-5 mb-4">
            <i class='bx bx-search icon'></i>
            <input type="text"class="menu" id="live_search" autocomplete="off" placeholder="Search...">
            <div id="search_result"></div>
            <button class="button_create">Create</button>
             </div>       
</div>
    </section>
    <script>
      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type ="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                $.ajax({
                        url:"http://localhost/Emloyee/livesearch.php",
                        method:"POST",
                        data:{data:$("#live_search").val()},                        
                        success:function(data){                           
                            $("#search_result").html(data);
                        },
                    });
            });
        });
        </script>
</body>
</html>
<?php 
}else{
    header("Location: index.php");
    exit();
}
?>