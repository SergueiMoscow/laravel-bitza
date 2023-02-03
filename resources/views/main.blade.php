<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen'></i>
            <span class="logo navlogo"><a href="/">Bytza.com</a></span>

            <div class="menu">
                <div class="menu-header">
                    <span class="logo"><a href="/">Bytza.com</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                @yield('mainmenu')
            </div>

            <div class="nav-buttons">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="search-block">
                    <div class="search-button">
                        <i class='bx bx-x cancel'></i>
                        <i class='bx bx-search search'></i>
                    </div>

                    <div class="search-string">
                        <input type="text" placeholder="Поиск...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script src="js/menu.js"></script>
    @yield('content')
</body>

</html>
