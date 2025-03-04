@extends('layouts.app')

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover text-center mt-4">
            <thead>
            <tr class="table-primary">
                <th style="width: 10%;">ID</th>
                <th style="width: 60%;">LIBELLE</th>
                <th style="width: 30%;">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salles as $s)
                <tr>
                    <td class="table-secondary">{{ $s->id }}</td>
                    <td>{{ $s->libelle }}</td>
                    <td class="text-nowrap">
                        <div class="btn-group" role="group">
                            <a href="{{ route('editSalle', ['id' => $s->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('deleteSalle', ['id' => $s->id]) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
