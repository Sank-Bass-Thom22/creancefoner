@extends('layouts.app-master')

@section('content')



    
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des taux</h4>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>  
                                <a href="{{ route ('createratesup') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>#</th>    
                                                <th>Taux</th>
                                                <th>Validité</th>
                                                <th>Option Suplémentaire</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($allRate as $rates)
                   
                                            <tr>
                                                <td>{{ $loop->index + 1}} </td>
                                                <td>{{ $rates->value }}%</td>
                                                <td>{{ $rates->validity }}</td>
                                                <td><a href="{{ route('showrate', $rates->id) }}" class="">VOIR PLUS</a></td>
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
