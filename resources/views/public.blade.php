<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen'></i>
        <span class="sagkiun navsagkiun"><a href="#">Bytza.com</a></span>
      
        <div class="menu">
        <div class="kuledsamin">
        <span class="sagkiun"><a href="#">Навигация</a></span>
        <i class='bx bx-x siderbarClose'></i>
        </div>
      
        <ul class="nav-links">
        <li><a href="{{ route('login') }}">{{ __("Login") }}</a></li>
        <li><a href="{{ route('register') }}">{{ __("Register" )}}</a></li>
        </ul>
        </div>
      
        <div class="poiskovay">
        <div class="dark-light">
        <i class='bx bx-moon moon'></i>
        <i class='bx bx-sun sun'></i>
        </div>
      
        <div class="poiskova-stroka">
        <div class="saiunkluca">
        <i class='bx bx-x cancel'></i>
        <i class='bx bx-search search'></i>
        </div>
      
        <div class="puesko-dsamva">
        <input type="text" placeholder="Поиск...">
        <i class='bx bx-search'></i>
        </div>
        </div>
        </div>
        </div>
        </nav>    
        <script src="js/menu.js"></script>

    </body>
</html>