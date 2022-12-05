@extends('layouts.app-master')

@section('content')

    <div class="updateservicename-box">
        <div class="card">
            <div class="card-body updateservicename-card-body">
                <p class="updateservicename-box-msg">
                <h1>Modification nom structure</h1>
                </p><br />

                <p class="updateservicename-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updateservicename-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('updateemployer', $employerProfile->id) }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="Servicename">Nom de la structure </label>
                        <input type="text" class="form-control" id="Servicename" name="servicename" value="{{ $employerProfile->servicename }}" required />
                    </div>
                    <div class="form-group ">
                        <label for="Email">Adresse E-mail </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $employerProfile->email }}" required />
                    </div>
                    <div class="form-group">
                        <label for="Telephone">Numéro de téléphone </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" value="{{ $employerProfile->telephone }}" required />
                    </div>

                  
                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>
                    
                        <a href="{{ route('allemployer') }}" class="btn mb-1 btn-danger">Retour</a> 
                        
                    </div>


                </form>

             
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updateservicename-box -->

@endsection
