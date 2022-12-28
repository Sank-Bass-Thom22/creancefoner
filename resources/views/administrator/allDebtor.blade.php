@extends('layouts.app-master')

@section('content')


<div class="card">
    <div class="card-body">
        <h4 class="card-title">Liste des redevables</h4>
       

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
        <br />



        <a href="{{ route('dashboard') }} " class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
        <a href="{{ route ('registerdebtor') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Nouveau</a>
       
        <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & prénom (s)</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Code Foner</th>
                        <th>Service</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allDebtor as $debtors)

                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $debtors->firstname }} {{ $debtors->lastname }}</td>
                        <td>{{ $debtors->email }}</td>
                        <td>{{ $debtors->telephone }}</td>
                        <td>{{ $debtors->codefoner }}</td>
                        <td>
                            @forelse($allService as $services)
                            @if ($services->serviceindex == $debtors->debtorindex)
                            {{ $services->servicename }}
                            @break
                            @endif
                            @empty
                            {{ __('Aucun service.') }}'
                            @endforelse
                        </td>
                        <td>
                            <a href="{{ route ('editdebtor', $debtors->id) }}" title="Modifier">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                            </a>
                            <a href="{{ route ('deletedebtor', $debtors->id) }}" title="Supprimer" >  
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg></a>
                            <a href="{{ route ('showloan', $debtors->id) }}" title="PRÊTS">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-ppt" viewBox="0 0 16 16">
                                    <path d="M7 5.5a1 1 0 0 0-1 1V13a.5.5 0 0 0 1 0v-2h1.188a2.75 2.75 0 0 0 0-5.5H7zM8.188 10H7V6.5h1.188a1.75 1.75 0 1 1 0 3.5z"/>
                                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                </svg>
                            </a>
                            <a href="{{ route('debregenerate', $debtors->id) }}" title="Nouveau mot de passe">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-text-wrap" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm0 4a.5.5 0 0 1 .5-.5h9a2.5 2.5 0 0 1 0 5h-1.293l.647.646a.5.5 0 0 1-.708.708l-1.5-1.5a.5.5 0 0 1 0-.708l1.5-1.5a.5.5 0 0 1 .708.708l-.647.646H11.5a1.5 1.5 0 0 0 0-3h-9a.5.5 0 0 1-.5-.5Zm0 4a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Z"/>
                                                    </svg>
                            </a>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="5">{{ $message }}</td>

                    </tr>

                    @endforelse




                </tbody>
            </table>

           
            {{$allDebtor->links("pagination::bootstrap-4")}}
            
        </div>
    </div>
</div>

@endsection
