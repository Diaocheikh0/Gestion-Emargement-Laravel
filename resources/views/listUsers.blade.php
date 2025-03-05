@extends('layouts.appAdmin')

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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
                        <a href="{{ route('editUser', ['id' => $u->id]) }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('deleteUser', ['id' => $u->id]) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
