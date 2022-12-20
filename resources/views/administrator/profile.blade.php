@extends('layouts.app-master')

@section('content')

    <div class="profile-box">
        <div class="card">
            <div class="card-body profile-card-body">
                <p class="profile-box-msg">
                <h1 class="">Mon profil</h1>
                </p><br />

                <p class="profile-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section>
                   
                    <h2>Informations personnelles</h2>

                    <table class="table header-border">
                        <thead>
                            <tr>
                                <th> Nom  </th>
                                <th>{{ $userProfile->lastname }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td>Prénom </td>
                                <td>{{ $userProfile->firstname  }}</td>                            
                            </tr>

                            <tr>
                                <td> Adresse E-mail </td>
                                <td>{{ $userProfile->email }}</td>                            
                            </tr>

                            <tr>
                                <td> Numéro de téléphone </td>
                                <td>+226{{ $userProfile->telephone }}</td>                            
                            </tr>


                            <tr>
                                <td> Responsabilité </td>
                                <td>{{ $userProfile->role }} 
                                <a href="{{ route('editadministrator', $userProfile->id) }}" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                </a>
                                </td>                            
                            </tr>

                            <tr>
                                <td>  Mot de passe   </td>
                                <td>****************

                                <a href="{{ route('editadminpassword') }}" title="Modifier">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                </a>

                                </td>                            
                            </tr>


                        </tbody>
                    </table>
                    
               
                    <div class="form-group">
       
                       
                        <a href="{{ route ('dashboard') }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
                 
                </section>
            </div>
        </div>
    </div>

@endsection
