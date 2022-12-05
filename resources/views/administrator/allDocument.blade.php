@extends('layouts.app-master')

@section('content')




                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Documents utils</h4>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>  
                                <a href="{{ route ('createdocument') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>#</th>    
                                                <th>Titre</th>
                                                <th>Fichier</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($allDocument as $documents)
                   
                                            <tr>
                                                <td>{{ $loop->index + 1}} </td>
                                                <td>{{ $documents->title }} </td>
                                                <td> <a href="/storage/{{ $documents->filelink }}" class="" download="">Télécharger</a>  </td>
                                                <td> {{ $documents->description }} </td>
                                                <td>
                                                @if (Auth::user()->role === "SuperAdmin")
                                                    <a href="{{ route ('editdocument', $documents->id) }}" class="">Modifier</a>
                                                    <a href="{{ route('destroydocument', $documents->id) }}" class="">Supprimer</a>
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
