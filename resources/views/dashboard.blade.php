<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="conatiner-fluid">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td class="text-center">{{ $cliente->id }}</td>
                                            <td>{{date_format($cliente->created_at,"Y/m/d H:i:s")}}</td>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->apellido }}</td>
                                            <td>{{ $cliente->identificacion }}</td>
                                            <td>{{ $cliente->ciudad->departamento->departamento }}</td>
                                            <td>{{ $cliente->ciudad->municipio }}</td>
                                            <td>{{ $cliente->celular }}</td>
                                            <td>{{ $cliente->email }}</td>
                                            <td>{{ $cliente->habeas?'Aceptado':'Sin Aceptar' }}</td>
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
</x-app-layout>
