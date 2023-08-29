@extends('layouts.admin')

@section('content')
<div class="container">
<h2 class="fs-4 text-secondary text-capitalize my-4">
    {{$type->name}} 
</h2>
<div class="card">
    <div class="card-header">
        Progetti con questo Tipo
    </div>
    @foreach ($type->projects as $project)
        <div>{{$project->project_name}}</div>
    @endforeach
</div>
<a href="{{ route('admin.type.edit', $type) }}" class="btn btn-success my-3">Modifica il Tipo</a>
<a href="{{ route('admin.type.index') }}" class="btn btn-primary">Torna alla lista Tipi</a>
</div>
@endsection