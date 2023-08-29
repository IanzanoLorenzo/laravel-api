@extends('layouts.admin')

@section('content')
<div class="container">
<h2 class="fs-4 text-secondary text-capitalize my-4">
    {{$technology->name}} 
</h2>
<a href="{{ route('admin.technology.edit', $technology) }}" class="btn btn-success my-3">Modifica Tecnologie</a>
<a href="{{ route('admin.technology.index') }}" class="btn btn-primary">Torna alla lista Tecnologie</a>
</div>
@endsection