@extends('layouts.app-master')

@section('content')




<div class="card">
    <div class="card-body">
        <h4 class="card-title">Liste des taux</h4>

        <p>
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                       <p class="alert alert-danger">{{ $error }}</p>
                                        @endforeach
                                    </ul>
                                @endif
                                </p>

        <p class="showdocument-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
        @if (Auth::user()->role == "SuperAdmin")
        <a href="{{ route ('createratesup') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Nouveau</a>
        @else
        <a href="#" disabled="disabled" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Nouveau</a>
        @endif
        <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Taux</th>
                        <th>Validité</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allRate as $rates)

                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $rates->value }}%</td>
                        <td>{{ $rates->validity }}</td>
                        <td>{{ $rates->description }}</td>
                        <td>
                            @if (Auth::user()->role == "SuperAdmin")
                            <a href="{{ route('editratesup', $rates->id) }}" class="">MODIFIER</a>
                            @else
                            <a href="#" disabled="disabled" class="">MODIFIER</a>
                            @endif
                        </td>
                        <td>
                            @if (Auth::user()->role == "SuperAdmin")
                            <a href="{{ route('destroyratesup', $rates->id) }}">SUPPRIMER</a>
                            @else
                            <a href="#" disabled="disabled" class="">SUPPRIMER</a>
                            @endif
                        </td>
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
