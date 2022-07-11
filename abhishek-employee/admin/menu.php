<nav class="sidebar open">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="<?php echo ASSETS ?>images/amantya-logo.png" alt="">
            </span>
        </div>
        <i class='bx bx-chevron-right toggle'></i>

        <h>Hi, <?php echo $_SESSION['aUser']->name; ?></h>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="teams.php">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">My Team</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="users.php">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">My Appraisel</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="<?php echo BASE_URL ?>php/logout.php">
                    <i class='bx bx-log-out icon'></i>
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