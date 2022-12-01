


@extends('layouts.app-master')

@section('content')


                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des employeurs</h4>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($allEmployer as $employers)
                   
                                            <tr>
                                                <td>{{ $loop->index + 1}} </td>
                                                <td>{{ $employers->firstname }} {{ $employers->lastname }}</td>
                                                <td>{{ $employers->email }}  </td>
                                                <td>{{ $employers->telephone }} </td>
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