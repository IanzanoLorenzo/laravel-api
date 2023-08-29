@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Types
    </h2>
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <a href="{{route('admin.dashboard')}}" class="btn btn-success mb-4">Dashboard</a>
        </div>
        <div class="col card">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">
                            #
                        </th>
                        <th scope="col">
                            Type name
                        </th>
                        <th class="text-center" scope="col">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <th class="text-center" scope="row">{{$type->id}}</th>
                        <td>{{$type->name}}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.type.show', $type ) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></a>
                            <a href="{{ route('admin.type.edit', $type) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                            <form method="POST" class="d-inline-block" action="{{ route('admin.type.destroy', $type) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-project" data-name-project="">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>
@include('admin.project.partials.modals')
@endsection