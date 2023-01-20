@extends('layouts.app-master')

@section('content')



<div class="bg-light p-4 rounded">
    <h1>Rôles</h1>
    <div class="lead">

    <a href="{{ route('dashboard') }}" class="btn mb-1 btn-danger">Retour</a>
        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Nouveau</a>
    </div>

    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>

    <table class="table header-border">
      <tr>
         <th >#</th>
         <th>Désignation</th>
         <th  >Action</th>
      </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Modifier</a>

                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>

    <div class="d-flex">
        {!! $roles->links() !!}
    </div>

</div>
@endsection
