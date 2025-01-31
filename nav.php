<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once("db.php");
         if ($_SESSION['logged_in'] === "active"){
            echo "<nav>
            <ul>
                <li><a href='index.php'><img src='slike/AS.png' alt='Logo' class='logo'></a></li>
                <li><a href='index.php'><i class='fas fa-home'></i>Home</a></li> 
                <li><a href='dodaj.php'><i class='fas fa-plus'></i>Dodaj</a></li>
                <li><a href='socials.php'><i class='fa-solid fa-people-arrows'></i>Socials</a></li>
            <li class='right-items'>
                    <div class='search-container'>
                        <form action='iskanje.php'>
                        <input type='text' name='query' placeholder='Search...' id='isci'>
                        <button type='submit' id='search-button'><i class='fas fa-search'></i></button>
                        </form>  
                    </div>
                    
                </li>
                <li><a href='cenik.php'><i class='fas fa-shopping-cart'></i></a></li>
                <li><a href='logout.php'><i class='fa-solid fa-right-from-bracket'></i></a></li>
                </ul>
            </nav>";
         }
         else if($_SESSION['logged_in'] != "active"){
            echo "<nav>
            <ul>
                <li><a href='index.php'><img src='slike/AS.png' alt='Logo' class='logo'></a></li>
                <li><a href='index.php'><i class='fas fa-home'></i>Home</a></li>
                <li><a href='login.php'><i class='fas fa-sign-in-alt'></i>Login</a></li>
                <li><a href='socials.php'><i class='fa-solid fa-people-arrows'></i>Socials</a></li>
            <li class='right-items'>
            <div class='search-container'>
            <form action='iskanje.php'>
            <input type='text' name='query' placeholder='Search...' id='isci'>
            <button type='submit' id='search-button'><i class='fas fa-search'></i></button>
            </form>  
        </div> 
                </li>
                <li><a href='cenik.php'><i class='fas fa-shopping-cart'></i></a></li>
                </ul>
            </nav>";
         } 
         ?>