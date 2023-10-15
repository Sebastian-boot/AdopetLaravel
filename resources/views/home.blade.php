@extends('layouts.app')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adopet | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container_title" >
            <h1>Bienvenid@ a Adopet</h1>
        </div>
    </main>


    <div class="container text-center">
        <div class="section-header">
            <h2>Sobre Nosotros</h2>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="about-us-container">
                <p class="text">
                    Somos una organización con el objetvio de ayudar a conectar a los animales abandonados en la calle con organizaciones beneficas
                    que buscan cuidar de ellos. Contando con el apoyo de la comunidad para reportar a estos peludos podremos facilitar la labor de
                    las fundaciones y así entregarles una mejor vida a nuestros amigos peludos.
                </p>
            </div>

          </div>
          <div class="col">
            <img class = "imgs" src="{{ asset('assets/img/2_animal.jpg') }}" alt="">
          </div>
        </div>

        <div class="section-header">
            <h2>Nuestra Mision</h2>
        </div>

        <div class = "row">
            <div class="col">
                <div class="col">
                    <img class = "imgs" src="{{ asset('assets/img/7_animal.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-6">
            <div class="about-us-container">
                <div>
                    <p class="text">
                        Nuestra misión es facilitar la colaboración entre la comunidad y las fundaciones para mejorar el bienestar de los animales en
                        situación de calle. A través de nuestra aplicación, buscamos proporcionar una plataforma efectiva y fácil de usar que permita
                        a la comunidad reportar y localizar animales abandonados, contribuyendo así a su rescate, cuidado y adopción. Nos esforzamos por
                        promover la compasión hacia los animales y fortalecer la red de apoyo para lograr un mundo en el que ningún animal sufra por
                        la falta de un hogar.
                    </p>
            </div>
            </div>
        </div>

        <div class="section-header">
            <h2>Nuestra Vision</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="about-us-container">
                    <h2 class="title">Visión</h2>
                    <p class="text">
                        Nuestra visión es la de un mundo en el que todos los animales en situación de calle tengan la oportunidad de encontrar un hogar
                        amoroso y una segunda oportunidad en la vida. Visualizamos una comunidad global comprometida con el bienestar de estos seres
                        vulnerables, donde nuestra aplicación sea una herramienta central que conecte de manera eficiente a quienes desean ayudar con
                        las fundaciones y rescatistas dedicados a esta causa.
                    </p>
                </div>

              </div>
              <div class="col">
                <img class = "imgs" src="{{ asset('assets/img/5_animal.jpg') }}" alt="">
            </div>

        </div>


    </div>

</div>
</body>
@endsection
