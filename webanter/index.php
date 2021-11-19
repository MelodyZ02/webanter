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
                  <a href="?lang=hu"><img src="https://www.worldometers.info/img/flags/small/tn_hu-flag.gif" style="width: 65px; height: 40px;"></img></a>
                  <a href="?lang=en"><img src="https://www.worldometers.info/img/flags/small/tn_uk-flag.gif" style="width: 65px; height: 40px;"></img></a>
                </div>
              </div>
        </header>
        <table class="center">
            <tr>
                <td>
                    <h1>Welcome to webanter!</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                <div class="btn-group">
                    <a href="login.html"><button style="width:50%">Login</button></a>
                    <a href="register.html"><button style="width:50%">Register</button></a>
                  </div>   
                </td>               
            </tr>

        </table>

        <footer class="container-fluid text-white" id="footer">

            <div>
                © 2021 MelodyZ
            </div>
        </footer>
    </body>
</html>