@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="fs-4 text-secondary text-capitalize m-4">
                Nuovo Progetto
            </h2>
            <div class="text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-success m-3">Torna alla dashboard</a>
            </div>
            <div class="card">
                <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group p-3">
                        <label class="control-label">Nome progetto</label>
                        <input type="text" name="project_name" id="project_name" class="form-control @error('project_name') is-invalid @enderror" placeholder="Inserisci il nome del progetto" value="{{ old('project_name') }}">
                        @error('project_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="control-label">Descrizione</label>
                        <textarea type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Inserisci la descrizione del progetto" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="contol-label">Autore</label>
                        <input type="text" name="creator_name" id="creator_name" class="form-control @error('creator_name') is-invalid @enderror" placeholder="Inserisci il nome dell'autore" value="{{ old('creator_name') }}"> 
                        @error('creator_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="form-group p-3">
                        <label class="control-label">Tipo di Progetto</label>
                        <select name="type_id" id="type_id" class="form-control">
                            <option value="" disabled selected>Seleziona un tipo</option>
                            @foreach ($types as $item)
                                <option value="{{$item->id}}" @selected(old('type_id') == $item->id)>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group p-3">
                        <div>
                            <label class="control-label">Tecnologie</label>
                        </div>
                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="technologies[]" id="technologies" class="form-check-input" value="{{ $technology->id }}" {{( in_array($technology->id, old('technologies', []))) ? 'checked' : ''}}>
                                <label class="label-check-control">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group p-3">
                        <label class="control-label">Immagine</label>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Crea progetto</button>  
                    <a href="{{ route('admin.project.index') }}" class="btn btn-primary">Torna alla lista progetti</a>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection