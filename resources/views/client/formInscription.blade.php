@extends('layouts.app1')

@section('title')
    Inscription
@endsection

@section('contenu')

@section('link')
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('frontend/formlogin/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/formlogin/css/main.css')}}">
<!--===============================================================================================-->

@endsection


   


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form p-l-55 p-r-55 p-t-178"  action="{{url('/insertion_client')}}" method="post">
                {{csrf_field()}}

                <span class="login100-form-title">
                    Inscription
                </span>

<!----------------------------- Messages de succès---->
@if(Session::has('succes'))
<div class="alert alert-success">   
    
    {{Session::get('succes')}} 
    {{Session::put('succes', null)}} 
</div>  
@endif
<!--------------- Validation des champs obligatoires---->
@if(count($errors)>0)
<div class="alert alert-danger">   
    <ul>
        @foreach ($errors->all() as $erreur)
        <li>{{$erreur}}</li>
        @endforeach
    </ul>
</div> 
@endif
<!--------------- Fin  Validation des champs obligatoires---->

                <div class="wrap-input100 validate-input m-b-16" data-validate="Entrer un nom d'utilisateur">
                    <input class="input100" type="text" name="username" placeholder="Nom d'utilisateur" value={{old('username')}}>
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('username'))
                <p style="color:red">{{$errors->first('username')}}</p>
                @endif
                
                <div class="wrap-input100 validate-input m-b-16" data-validate="Entrez un email s'il vous plait.">
                    <input class="input100" type="email" name="courriel" placeholder="Email" value={{old('courriel')}} >
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('courriel'))
                <p style="color:red">{{$errors->first('courriel')}}</p>
                @endif

                <div class="wrap-input100 validate-input m-b-16" data-validate="Définir un mot de passe">
                    <input class="input100" type="password" name="password" placeholder="Mot de passe">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('password'))
                <p style="color:red">{{$errors->first('password')}}</p>
                @endif

                <div class="wrap-input100 validate-input" data-validate = "Confirmer le mot de passe">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirmation mot de passe">
                    <span class="focus-input100"></span>
                </div><br/>
                @if($errors->has('password_confirmation'))
                <p style="color:red">{{$errors->first('password_confirmation')}}</p>
                @endif
                


                <div class="text-right p-t-13 p-b-23">
                    <span class="txt1">
                        Oublié
                    </span>

                    <a href="#" class="txt2">
                        Courriel / Mot de passe?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        S'inscrire
                    </button>
                </div>

                <div class="flex-col-c p-t-80 p-b-40">
                    <span class="txt1 p-b-9">
                        Déjà inscrit?
                    </span>

                    <a href={{URL('/login')}} class="txt3">
                        Se connecter
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


   
    <!-- Breadcrumb Form Section Begin -->

    
    <!-- Register Form Section End -->
@endsection

@section('script')
<!--===============================================================================================-->
<script src="{{asset('frontend/formlogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/formlogin/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/formlogin/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('frontend/formlogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/formlogin/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/formlogin/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('frontend/formlogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/formlogin/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/formlogin/js/main.js')}}"></script>
    
@endsection
