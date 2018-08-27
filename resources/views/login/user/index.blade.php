
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Apolo Constructora</title>


    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="css/style.css">

    <style>

        * {
            padding: 0px;
            margin: 0px;
            font-family: 'Roboto', sans-serif;
        }

        body {
            /*background: url('') no-repeat;*/
            background: #34495e;
            background-size: 100% 100%;
        }
        </style>

</head>

<body>


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
{!!Form::open(array('url'=>'login/user','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <div class="group">
                    <label for="usuario" class="label">Usuario</label>
                    <input name="usuario" type="text" class="input">
                </div>

                <div class="group">
                    <label for="Contraseña" class="label">Contraseña</label>
                    <input name="Contraseña" type="password" class="input" data-type="password">
                </div>

                <div class="group">
                    <input   type="submit" class="button" value="Ingresar">
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
{!! Form::close() !!}

</body>
</html>