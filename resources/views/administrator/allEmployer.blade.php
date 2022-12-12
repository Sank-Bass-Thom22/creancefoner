


@extends('layouts.app-master')

@section('content')


                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des employeurs</h4>

                                <p class="showdocument-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
                                <a href="{{ route ('registeremployer') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Désignation</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th colspan="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($allEmployer as $employers)

                                            <tr>
                                                <td>{{ $loop->index + 1}} </td>
                                                <td>{{ $employers->servicename }}</td>
                                                <td>{{ $employers->email }}  </td>
                                                <td>{{ $employers->telephone }} </td>
                                                <td><a href="{{ route ('editemployer', $employers->id) }}">MODIFIER</a></td>
                        <td><a href="{{ route ('deleteemployer', $employers->id) }}">SUPPRIMER</a></td>
                        <td><a href="{{ route('empregenerate', $employers->id) }}">GÉNÉRER UN NOUVEAU MOT DE PASSE</a></td>
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
