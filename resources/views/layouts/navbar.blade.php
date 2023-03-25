<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body >
       
       
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">MyStack Over</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Accueil</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Collectives
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('collectives.index')}}">Mes collectives</a></li>
                            <li><a class="dropdown-item" href="{{route('collectives.create')}}">Créer collective</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Questions
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('questions.index')}}">Mes questions</a></li>
                            <li><a class="dropdown-item" href="{{route('questions.create')}}">créer question</a></li>
                        </ul>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    @guest
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mon Compte
                    </a>
                    @endguest
                    @auth
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    @endauth

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @guest
                            <li><a class="dropdown-item" href="{{route('login')}}">Se connecter</a></li>
                            <li><a class="dropdown-item" href="{{route('register')}}">S'inscrire</a></li>
                        @endguest
                        @auth
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form id="logoutForm" action="{{route('logout')}}" method="post">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#"
                                       onclick="document.getElementById('logoutForm').submit()">Deconnexion</a>
                                </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



     
     
        
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
              


            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            
             
                
                          
                       
                  
                  
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                  
                    <div class="col-lg-4 my-3 my-lg-0">
                       
                    </div>
                    <div class="col-lg-4 text-lg-end">
                       
                        
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
       
       
       
       
       
    </body>
</html>
