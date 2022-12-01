@extends('layouts.app-master')

@section('content')


                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des administrateurs</h4>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>  
                                <a href="{{ route ('registeradminsup') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>#</th>    
                                                <th>Nom & prénom (s)</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($allAdministrator as $administrators)
                   
                                            <tr>
                                                <td>{{ $loop->index + 1}} </td>
                                                <td>{{ $administrators->firstname }} {{ $administrators->lastname }}</td>
                                                <td>{{ $administrators->email }}  </td>
                                                <td>{{ $administrators->telephone }} </td>
                                                <td></td>
                                             
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