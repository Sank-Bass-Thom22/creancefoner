@extends('layouts.app-master')

@section('content')


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Liste des banques</h4>

        <p>
            @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </ul>
        @endif
        </p>

        <p class="allBank-box-success">
            @if (session()->get('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        </p>

        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
        <a href="{{ route ('createbank') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Nouveau</a>
        <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Désignation</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allBank as $banks)
                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $banks->name }}</td>
                        <td>{{ $banks->email }} </td>
                        <td>{{ $banks->telephone }} </td>
                        <td>{{ $banks->description }}</td>
                        <td><a href="#">MODIFIER</a></td>
                        <td><a href="#">SUPPRIMER</a></td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="5"></td>

                    </tr>

                    @endforelse




                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
