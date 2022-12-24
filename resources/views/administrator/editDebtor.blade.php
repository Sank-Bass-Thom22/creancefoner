@extends('layouts.app-master')

@section('content')

    <div class="updatefullname-box">
        <div class="card">
            <div class="card-body updatefullname-card-body">
                <p class="updatefullname-box-msg">
                <h1>Modification nom prénom</h1>
                </p><br />

                <p class="updatefullname-box-error">
                    @if ($errors->any())
               
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                <br />
                @endif
                </p>

                <p class="updatefullname-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route('updatedebtor', $debtorProfile->id) }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="Firstname">Prénom </label>
                        <input type="text" class="form-control" id="Firstname" name="firstname" value="{{ $debtorProfile->firstname }}" required />
                    </div>
                    <div class="form-group ">
                        <label for="Lastname">Nom </label>
                        <input type="text" class="form-control" id="Lastname" name="lastname" value="{{ $debtorProfile->lastname }}" required />
                    </div>
                    <div class="form-group ">
                        <label for="Email">Adresse E-mail </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $debtorProfile->email }}" required />
                    </div>
                    <div class="form-group ">
                        <label for="Telephone">Numéro de téléphone  </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" value="{{ $debtorProfile->telephone }}" required />
                    </div>
                    <div class="form-group ">
                        <label for="codefoner">Code Foner </label>
                        <input type="text" class="form-control" id="codefoner" name="codefoner" value="{{ $debtorProfile->matricule }}" required />
                    </div>
                    <div class="form-group ">
                            <label for="Serviceindex">Lieu de travail </label>
                            <select id="Serviceindex" class="form-control" name="serviceindex" required>
                                <option></option>
                                @forelse($allServices as $services)
                                <option value="{{ $services->serviceindex }}">{{ $services->servicename }}</option>
                                @empty
                            </select><br/>
                            <div class="">Aucune structure enregistrée! </div>
                            @endforelse
                            </select>
                        </div>

                        <div class="form-group">
       
                            <button type="submit" class="btn mb-1 btn-primary">Valider</button>
                        
                            <a href="{{ route('alldebtor') }}" class="btn mb-1 btn-danger">Retour</a> 
                            
                        </div>
                </form>

          


            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updatefullname-box -->

@endsection
