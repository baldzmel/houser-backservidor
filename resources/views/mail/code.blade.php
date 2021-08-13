<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código contraseña</title>
    <style>
        h1 {text-align:center;
            font-weight:bold;}

        hr{
            border:2px solid black;
        }

        #usuario{
            font-size:1em;
        }

        #box{
            width:80%;
            margin:auto;
            display:block;
            margin-top:2em;
        }

        body{
            background-color:#f4f4ff;
        }

        img{
            margin-top: 1em;
        }

    </style>

</head>
<body>

<h1>Recuperar contraseña</h1>
<hr>

<div id="box">

    <p id="usuario">Recibimos tu petición de que olvidaste tu contraseña. Te dejamos el código: <b>{{$random}} </b>para que puedas restablecer tu contraseña. </p>

{{--    <img width="200" height="100" src="{{url("imgs/bus.png")}}" alt="Autobus andiamo">--}}

</div>

</body>
</html>
