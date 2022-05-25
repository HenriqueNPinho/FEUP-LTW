<?php
session_start();
include_once('templates/elements.tpl.php');
include_once ('database/connection.php');
include_once ('database/account.php');

drawHeader();
if (account::isLoggedIn()){
    header("Location:index.php");
    exit();
}
if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::login($_POST["email"],$_POST["password"]);
}
?>
    <div class="login">
        <form action="login.php" method="post" >
            <h1>Login to your account</h1>

            <label for="email"><b>Email</b></label>
            <input name="email" required="required" type="email" placeholder="Enter email ..">
            
            <label for="password"><b>Password</b></label>
            <input name="password" type="password" required="required" placeholder="Enter password ..">

            <div id="login-checkbox">
                <input type="checkbox" checked name="stayloggedin">Stay logged in</input>
                <span class="psw">Forgot <a href="/recover-password.php">password?</a></span>
            </div>
            <button type="submit">Login</button>
        </form>
        <hr id="login-bar">
        <div id="login-newacc">
            <h2>Don't have an account?</h2>
            <button onclick=loginToReg()>Sign Up here</button>
            
        </div>
    </div>

<?php drawFooter() ?>

<script src="./javascript/login&register.js"> 
    loginToReg()
 </script>