<?php

function generateHeader(){?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Title</title>
        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/layout.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="index.php">
                <img src="logo.jpeg" alt="logo">
            </a>
            <form id="search-bar" action="search-results.php" method="get">
                <input type="text" name="search-bar" placeholder="Restaurant, city, ...">
            </form>
            <div id="signup">
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
          </div>
        </header>

<?php }

function generateFooter(){}

function generateRestaurantElement(){}

function generateDishElement(){}