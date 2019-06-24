<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="{!! asset('assets/js/sweet-alert.min.js') !!}"></script>
    <link rel="stylesheet" href="{!! asset('assets/css/sweet-alert.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/material-design-iconic-font.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/normalize.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/jquery.mCustomScrollbar.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/login.css') !!}"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    {{-- <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script> --}}
    <script src="{!! asset('assets/js/modernizr.js') !!}"></script>
    <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.mCustomScrollbar.concat.min.js') !!}"></script>
    <script src="{!! asset('assets/js/main.js') !!}"></script>
</head>
<body class="full-cover-background" style="background-image:url(assets/assets/img/font-login.jpg);">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
           <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
       </p>
       <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>
       <form method="POST" action="{{ route('login1') }}">
        @csrf
            <div class="group-material-login">
              <input type="email" class="material-login-control{{ $errors->has('email') ? ' is-invalid' : '' }}" maxlength="70" value="{{ old('email') }}" name="email" id="email">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-account"></i> &nbsp; Email:</label>
              <span class="invalid-feedback hidden" role="alert" id="email-error">
                    <strong>Hola</strong>
                </span>
            </div><br>

            <div class="group-material-login">
              <input type="password" class="material-login-control{{ $errors->has('password') ? ' is-invalid' : '' }}" maxlength="70" name="password" id="password">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
              <span class="invalid-feedback hidden" role="alert" id="password-error">
                    <strong>hola</strong>
                </span>
            </div>
            <button class="btn-login" type="button" id="ingresar">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
            @if (Route::has('password.request'))
                <a class="text-white" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </form>
        <span id="resultado"></span>
    </div>

    <script>
        $('#ingresar').click(function() {
            let email = $('#email').val();
            let password = $('#password').val();
            $.ajax({
                url: "{{ route('login1') }}",
                headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                method: "POST",
                data: {
                    email:email,
                    password:password
                },
                success: function(data){
                    console.log(data);
                    if(data.estado == 'aceptado'){
                        location.href = "{{ route('principal') }}";
                    }else if(data.estado == 'intentando'){
                        $('#resultado').html(`<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>!Error</strong> Estimad@ ${data.user.name} su numero de intentos es ${data.user.attempts}</div>`);
                    }else if(data.estado == 'primero'){
                        $('#resultado').html(`<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>!Error</strong> Estimad@ ${data.user.name} usted ya supero los tres intentos y tiene un total de intentos fallidos de ${data.user.total_attempts} haci que mucho cuidado con el bloqueo por ahora debe esperar hasta tal hora ${data.user.lock_date}</div>`);
                    }else if(data.estado == 'segundo'){
                        $('#resultado').html(`<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>!Error</strong> Estimad@ ${data.user.name} usted ya supero los tres intentos y tiene un total de intentos fallidos de ${data.user.total_attempts} haci que si falla los siguientes 3 intentos se pasara a bloquearlo, por ahora debe esperar hasta tal hora ${data.user.lock_date}</div>`);
                    }else if(data.estado == 'bloqueado'){
                        $('#resultado').html(`<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>!Error</strong> Estimad@ ${data.user.name} debe esperar hasta que se cumpla su hora de penalizacion por los tres intentos fallidos, hora ${data.user.lock_date}</div>`);
                    }else if(data.estado == 'noExiste'){
                        $('#resultado').html(`<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>!Error</strong> Estas credenciales no existen en nuestra Base de Datos</div>`);

                    }else if(data.estado == 'comuniquese'){
                        $('#resultado').html(`<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>!Error</strong> Estimad@ ${data.user.name} usted ya supero el total de intentos permitidos para fallar por favor comuniquese con el administrado o administradora para el desbloqueo </div>`);                    }
                }
            });
        });
    </script>  
</body>
</html>