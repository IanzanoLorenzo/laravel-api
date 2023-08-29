@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Projects
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
                            Project name
                        </th>
                        <th scope="col">
                            Author
                        </th>
                        <th class="text-center" scope="col">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th class="text-center" scope="row">{{$project->id}}</th>
                        <td>{{$project->project_name_slug}}</td>
                        <td>{{$project->creator_name}}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.project.show', $project ) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></a>
                            <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                            <form method="POST" class="d-inline-block" action="{{ route('admin.project.destroy', $project) }}">
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