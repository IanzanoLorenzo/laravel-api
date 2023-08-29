@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-4 text-secondary text-capitalize my-5">
                Crea Tipo
            </h2>
            <div class="text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-success m-3">Torna alla dashboard</a>
            </div>
            <div class="form-control">
                <form action="{{route('admin.type.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group p-3">
                        <label class="control-label">Nome tipo</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome del progetto" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Conferma creazione</button>  
                </form>
            </div>
        </div>
    </div>
</div>
@endsection