


@extends('layouts.app-master')

@section('content')


                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste des redevables</h4>
                                <p class="search-box">
                                    
             
                <form method="POST" action="{{ route ('researchdebtor') }}">
                    @csrf

                        <div class="">
                        
                            <div class="header-left">
                        <div class="input-group icons">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                            </div>
                            <input type="search" class="form-control"  id="Research" name="research" required placeholder="Recherche redevable" >
                            <button type=""  class="btn-info btn-lg">Valider</button>
                        </div>
                        
                    </div>
                    </div>
             
                </form>
                </p><br />


            


                                <a href="{{ route('dashboard') }} " class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>  
                                <a href="{{ route ('registerdebtor') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a>
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
                                            @forelse ($allDebtor as $debtors)
                    
                                                <tr>
                                                    <td>{{ $loop->index + 1}} </td>
                                                    <td>{{ $debtors->firstname }} {{ $debtors->lastname }}</td>
                                                    <td>{{ $debtors->email }} </td>
                                                    <td> </td>
                                                    <td></td>
                                                
                                                </tr>

                                            @empty
                                                <tr>
                                                    <td colspan="5">{{ $message }}</td>
                                                
                                                </tr>

                                            @endforelse



                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

@endsection