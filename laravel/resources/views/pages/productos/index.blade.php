@extends('layouts.app')

@section('content')
    <section class="py-11 bg-light-gradient border-bottom border-white border-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <h5>Productos</h5>
                </div>
                <div class="col-6 text-center">
                    <button class="btn btn-primary">Crear Producto</button>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-10">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>${{ $item->price }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach

                            <!-- Puedes agregar más filas según sea necesario -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
