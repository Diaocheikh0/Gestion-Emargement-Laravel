@extends('layouts.appAdmin')

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ session('status') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="text-center mb-4">Liste des Utilisateurs</h2>
    <table class="table table-striped table-hover text-center mt-4">
        <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td class="table-secondary">{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->role}}</td>
                <td>
                    <div class="btn-group gap-2" role="group">
                        <a href="{{ route('register.edit', [$u->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('register.destroy', [$u->id]) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x-octagon"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

        {{$users->links()}}

@endsection
