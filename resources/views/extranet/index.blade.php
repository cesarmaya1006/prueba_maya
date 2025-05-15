<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('imagenes/sistema/mayo-icono.ico') }}"
        sizes="64x64">
    <title>Prueba Cesar Maya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('extranet/css/index.css') }}">
</head>

<body>
    <div class="row bg-dark d-flex justify-content-center pr-5 pl-5">
        <div class="col-12 pr-5 pl-5">
            <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary pr-5 pl-5"
                data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('extranet.index') }}">
                        <img src="{{ asset('imagenes/sistema/logoWhite.png') }}" alt="Bootstrap" width="30"
                            height="24">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('extranet.index') }}">Inicio</a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="{{ route('login') }}"
                                    class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal"
                                    style="color: white;text-decoration: none;">
                                    Log in
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('imagenes/index/slide1.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('imagenes/index/slide2.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('imagenes/index/slide3.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('imagenes/index/slide4.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('imagenes/index/slide5.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12 d-flex justify-content-center">
            @if ($clientes->where('ganador', '1')->count() > 0)
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('imagenes/sistema/ganador.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ganador del Sorteo</h5>
                        <p class="card-text">{{$clientes->firstWhere('ganador','1')->nombre . ' ' . $clientes->firstWhere('ganador','1')->apellido}}</p>
                    </div>
                </div>
            @else
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-warning" type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <img src="{{ asset('imagenes/index/banner.jpg') }}" class="img-fluid w-100" alt="...">
                    </button>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 d-flex justify-content-center">
            <div class="card d-flex justify-content-center" style="width: 18rem;">
                <img src="{{ asset('imagenes/index/card1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Modelo Rojo</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card’s content.</p>
                    <a href="#" class="btn btn-primary">Ver mas ...</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-center">
            <div class="card d-flex justify-content-center" style="width: 18rem;">
                <img src="{{ asset('imagenes/index/card2.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Modelo Compacto</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card’s content.</p>
                    <a href="#" class="btn btn-primary">Ver mas ...</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-center">
            <div class="card d-flex justify-content-center" style="width: 18rem;">
                <img src="{{ asset('imagenes/index/card3.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Deportivo</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card’s content.</p>
                    <a href="#" class="btn btn-primary">Ver mas ...</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 d-flex justify-content-center">
            <div class="card d-flex justify-content-center" style="width: 18rem;">
                <img src="{{ asset('imagenes/index/card4.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mayor Independencia</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card’s content.</p>
                    <a href="#" class="btn btn-primary">Ver mas ...</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content form-horizontal" id="form_cliente" action="{{ route('cliente.store') }}"
                method="POST" autocomplete="off">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @csrf
                        @method('post')
                        <div class="col-12 col-md-6 form-group" id="caja_nombre">
                            <label class="requerido" for="nombre">Nombres</label>
                            <input type="text" class="form-control form-control-sm txtOnly" name="nombre"
                                id="nombre" required>
                        </div>
                        <div class="col-12 col-md-6 form-group" id="caja_apellido">
                            <label class="requerido" for="apellido">Apellidos</label>
                            <input type="text" class="form-control form-control-sm txtOnly" name="apellido"
                                id="apellido" required>
                        </div>
                        <div class="col-12 col-md-6 form-group" id="caja_identificacion">
                            <label class="requerido" for="identificacion">Cédula</label>
                            <input type="text" class="form-control form-control-sm input-number"
                                name="identificacion" id="identificacion" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 form-group">
                            <label class="requerido" for="departamento_id">Departamento</label>
                            <select id="departamento_id" class="form-control form-control-sm"
                                data_url="{{ route('departamento.getMunicipios') }}" required>
                                <option value="">Elija departamento</option>
                                @foreach ($departamentos as $departamento)
                                    <option value="{{ $departamento->id }}">
                                        {{ $departamento->departamento }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="requerido" for="municipio_id">Ciudad</label>
                            <select id="municipio_id" name="municipio_id" class="form-control form-control-sm"
                                required>
                                <option value="">Elija primero un departamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 form-group" id="caja_celular">
                            <label class="requerido" for="celular">Celular</label>
                            <input type="text" class="form-control form-control-sm input-number" name="celular"
                                id="celular" required>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="requerido" for="email">Correo Electrónico</label>
                            <input type="email" class="form-control form-control-sm" name="email" id="email"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 form-group">
                            <div class="form-check" style="font-size: 0.7em;font-weight: bold">
                                <input class="form-check-input" type="checkbox" value="1" id="habeas"
                                    name="habeas" required>
                                <label class="form-check-label" for="habeas">Autorizo el tratamiento de mis datos de
                                    acuerdo con la finalidad establecida en la política de protección de datos
                                    personales</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('extranet/js/index.js') }}"></script>
</body>

</html>
