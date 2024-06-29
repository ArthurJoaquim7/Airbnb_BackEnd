@extends('reservas.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Editar Reserva</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('reservas.index') }}"><i class="fa fa-arrow-left"></i>
                    Voltar</a>
            </div>

            <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputTitle" class="form-label"><strong>Title:</strong></label>
                    <input type="text" name="title" value="{{ $reserva->title }}"
                        class="form-control @error('title') is-invalid @enderror" id="inputTitle" placeholder="Title">
                    @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputWhere" class="form-label"><strong>Where:</strong></label>
                    <textarea class="form-control @error('where') is-invalid @enderror" style="height:150px" name="where" id="inputWhere"
                        placeholder="Where">{{ $reserva->where }}</textarea>
                    @error('where')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Price" class="form-label"><strong>Price:</strong></label>
                    <input type="text" name="price" value="{{ $reserva->price }}"
                        class="form-control @error('Price') is-invalid @enderror" id="inputPrice" placeholder="Price">
                    @error('Price')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Atualizar</button>
            </form>

        </div>
    </div>
@endsection
