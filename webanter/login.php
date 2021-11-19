<html>
    <head>
        <title>webanter</title>
        
        <link href="css/index.css" rel="stylesheet">
        <script type="text/javascript">
            function backgr(){
            var backimg = ["backgrounds/001.jpg",
                           "backgrounds/002.jpg",
                           "backgrounds/003.jpg",
                           "backgrounds/004.jpg",
                           "backgrounds/005.jpg",
                           "backgrounds/006.jpg",
                           "backgrounds/007.jpg",
                           "backgrounds/008.jpg",
                           "backgrounds/009.jpg",
                           "backgrounds/010.jpg",
                           "backgrounds/011.jpg",
                           "backgrounds/012.jpg",
                           "backgrounds/013.jpg",
                           "backgrounds/014.jpg",
                           "backgrounds/015.jpg",];
            var randimg =Math.floor(Math.random()*15);
            document.body.background = backimg[randimg];
            }
            </script>
    </head>
    <body onload="backgr()">
        <header>
            <div class="dropdown">
                <button class="dropbtn">Language</button>
                <div class="dropdown-content">
                  <a href="#"><img src="https://www.worldometers.info/img/flags/small/tn_hu-flag.gif" style="width: 65px; height: 40px;"></img></a>
                  <a href="#"><img src="https://www.worldometers.info/img/flags/small/tn_uk-flag.gif" style="width: 65px; height: 40px;"></img></a>
                </div>
              </div>
        </header>

        <div class="container">
            <!--Data or Content-->
            <div class="box-1">
                <div class="content-holder">
                    <h2>Hello!</h2>
                    <p>By logging in you agree to the ridiculously long terms that you didn't bother to read</p>
                    <button class="button-1" onclick="signup()">Sign up</button>
                    <button class="button-2" onclick="login()">Login</button>
                </div>
            </div>
    
            
            <!--Forms-->
            <div class="box-2">
                <div class="login-form-container">
                    <h1>Login Form</h1>
                    <input type="text" placeholder="Username" class="input-field">
                    <br><br>
                    <input type="password" placeholder="Password" class="input-field">
                    <br><br>
                    <button class="login-button" type="button">Login</button>
                </div>
    
    
    <!--Create Container for Signup form-->
            <div class="signup-form-container">
                <h1>Sign Up Form</h1>
                <input type="text" placeholder="Username" class="input-field">
                <br><br>
                <input type="email" placeholder="Email" class="input-field">
                <br><br>
                <input type="password" placeholder="Password" class="input-field">
                <br><br>
                <button class="signup-button" type="button">Sign Up</button>
            </div>
    
    
    
            </div>
    
    
    

        <footer class="container-fluid text-white" id="footer">

            <div>
                © 2021 MelodyZ
            </div>
        </footer>
    </body>
</html>