
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Créance FONER  - Connexion</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                              
                                <center>
                                    <img src="{{asset('images/logo.jpg')}}" alt="" class="img-fluid mb-4">
                                </center>
                                <a class="text-center" href=""> <h4>Connexion</h4></a>

                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                       <p class="alert alert-danger">{{ $error }}</p>
                                        @endforeach
                                    </ul>
                                @endif


                                <form action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email" class="form-control"  id="Email" name="email" placeholder="Adresse E-mail" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Mot de passe" id="Password" name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" id="Remember" name="remember" />
                                        <label for="Remember">
                                            Se souvenir de moi
                                        </label>

                                    </div>

                                    <button class="btn login-form__btn submit w-100">Se Connecter</button>
                                </form>
                                <p class="mt-5 login-form__footer">Mot de passe oublié ? <a href="{{ route ('forgot-password') }}" class="text-primary">Cliquez</a> ici</p>
                           <br>
                           <center><small>All Rights Reserved by FONER. Designed and Developed by  <a href="https://www.begotech.com">Begotech Begotech</a> </small> </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('plugins/common/common.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/gleek.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>
</body>
</html>





