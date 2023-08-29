@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Technologies
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
                            Technology name
                        </th>
                        <th class="text-center" scope="col">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                    <tr>
                        <th class="text-center" scope="row">{{$technology->id}}</th>
                        <td>{{$technology->name}}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.technology.show', $technology ) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></a>
                            <a href="{{ route('admin.technology.edit', $technology) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                            <form method="POST" class="d-inline-block" action="{{ route('admin.technology.destroy', $technology) }}">
                                @csrf
                                @method('DELETE')
                                <button technology="submit" class="btn btn-danger delete-project" data-name-project="">
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