


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
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($allEmployer as $employers)

                                            <tr>
                                                <td>{{ $loop->index + 1}} </td>
                                                <td>{{ $employers->servicename }}</td>
                                                <td>{{ $employers->email }}  </td>
                                                <td>{{ $employers->telephone }} </td>
                                                <td>
                                                    <a href="{{ route ('editemployer', $employers->id) }}" title="Modifier">
                                                      
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route ('deleteemployer', $employers->id) }}" title="Supprimer">
                                                        
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('empregenerate', $employers->id) }}" title="Générer un nouveau mot de passe">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-text-wrap" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm0 4a.5.5 0 0 1 .5-.5h9a2.5 2.5 0 0 1 0 5h-1.293l.647.646a.5.5 0 0 1-.708.708l-1.5-1.5a.5.5 0 0 1 0-.708l1.5-1.5a.5.5 0 0 1 .708.708l-.647.646H11.5a1.5 1.5 0 0 0 0-3h-9a.5.5 0 0 1-.5-.5Zm0 4a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Z"/>
                                                    </svg>
                                                    </a>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="5"></td>

                                             </tr>

                                        @endforelse




                                        </tbody>
                                    </table>

                                    
                                

                                    {{$allEmployer->links("pagination::bootstrap-4")}}
                                </div>
                            </div>
                        </div>






@endsection
