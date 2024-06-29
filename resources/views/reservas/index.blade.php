@extends('reservas.layout')

@section('content')

    <div class="card mt-5">
        <div class="card-body">

            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('reservas.create') }}"> <i class="fa fa-plus"></i> Criar uma reserva</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Title</th>
                        <th>Where</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reservas as $reserva)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $reserva->title }}</td>
                            <td>{{ $reserva->where }}</td>
                            <td>{{ $reserva->price }}</td>
                            <td>
                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">

                                    <a class="btn btn-info btn-sm" href="{{ route('reservas.show', $reserva->id) }}"><i
                                            class="fa-solid fa-list"></i> Detalhes</a>

                                    <a class="btn btn-primary btn-sm" href="{{ route('reservas.edit', $reserva->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i> Editar</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                        Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">There are no data.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            {!! $reservas->links() !!}

        </div>
    </div>
@endsection
