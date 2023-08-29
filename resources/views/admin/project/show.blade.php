@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary text-capitalize my-4">
        {{$project->project_name}} 
    </h2>
    <div class="card">
        <div class="card-header h5">Author: {{$project->creator_name}}</div>
        <div class="card-body">
            <p class="fs-5">
                {{$project->description}}
            </p>
            @if (isset($project->technologies))
                @foreach ($project->technologies as $technology)
                    <span class="badge bg-primary">{{$technology->name}}</span>
                @endforeach
            @endif
            @if ($project->type_id !== null)
                <p class="fs-5">Tipo: {{ $project->type->name }}</p>
            @endif
            @if ($project->image !== null)
                <img src="{{ asset('storage/'.$project->image) ?? ''}}" alt="immagine non trovata">
            @endif
            <p class="fs-5">
                {{$project->creation_date}}
            </p>
            <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-success my-3">Modifica il Progetto</a>
            <a href="{{ route('admin.project.index') }}" class="btn btn-primary">Torna alla lista progetti</a>
        </div>
    </div>
</div>
@endsection