<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.dataTables.css">

</head>

<body>
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            </ul>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf @method('post')
                                <button id="popoverData" type="submit" class="nav-link"
                                    data-content="Salir de la plataforma" rel="popover" data-placement="bottom"
                                    data-trigger="hover">Salir
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        @if ($clientes->count() > 4)
            <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-10 mt-3 mb-3">
                    <form class="col-12 form-horizontal" action="{{ route('ganador') }}" method="POST" autocomplete="off">
                        @csrf
                        @method('post')
                        <div class="row mt-5">
                            <div class="col-12 col-md-6 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                                <button type="submit" class="btn btn-success btn-sm btn-sombra pl-sm-5 pr-sm-5"
                                    style="font-size: 0.8em;">Eliger Ganador</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
            </div>
        @endif
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <div class="conatiner-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-9">
                            @include('includes.error-form')
                            @include('includes.mensaje')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped table-hover table-sm" id="tablaClientes">
                                <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Fecha y hora de registro</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">Cédula</th>
                                        <th class="text-center">Departamento</th>
                                        <th class="text-center">Ciudad</th>
                                        <th class="text-center">Celular</th>
                                        <th class="text-center">Correo Electrónico</th>
                                        <th class="text-center">Habeas Data</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr class="{{ $cliente->ganador ? 'table-success' : '' }}">
                                            <td class="text-center">{{ $cliente->id }}</td>
                                            <td>{{ date_format($cliente->created_at, 'Y/m/d H:i:s') }}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->apellido }}</td>
                                            <td>{{ $cliente->identificacion }}</td>
                                            <td>{{ $cliente->ciudad->departamento->departamento }}</td>
                                            <td>{{ $cliente->ciudad->municipio }}</td>
                                            <td>{{ $cliente->celular }}</td>
                                            <td>{{ $cliente->email }}</td>
                                            <td>{{ $cliente->habeas ? 'Aceptado' : 'Sin Aceptar' }}</td>
                                            <td>{{ $cliente->ganador ? 'GANADOR' : '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.print.min.js"></script>



    <script>
        new DataTable('#tablaClientes', {
            layout: {
                topStart: {
                    buttons: ['excel']
                }
            }
        });
    </script>
</body>

</html>
