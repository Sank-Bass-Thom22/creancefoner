@extends('layouts.app-master')

@section('content')

    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">
                <h1>Création d'un compte employeur</h1>
                </p><br />

                <p class="register-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="register-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('registeremployer') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Servicename">Nom de la structure </label>
                        <input type="text" class="form-control" id="Servicename" name="servicename" required />
                    </div>
                    <div class="form-group">
                        <label for="Email">Adresse E-mail </label>
                        <input type="email" class="form-control" id="Email" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="Telephone">Numéro de téléphone  </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" required />
                    </div>
                    <div class="form-group">
                        <label for="Servicelocation">Situation géographique : </label>
                        <input type="text" id="Servicelocation" class="form-control" name="servicelocation" />
                    </div>
                    <div class="form-group">
                        <label for="Firstname">Prénom DRH : </label>
                        <input type="text" id="Firstname" class="form-control" name="firstname" /()>
                    </div>
                    <div class="form-group">
                        <label for="Lastname">Nom DRH : </label>
                        <input type="text" id="Lastname" class="form-control" name="lastname" />
                    </div>
                    <div class="form-group">
                        <label for="EmailDRH">Adresse E-mail DRH : </label>
                        <input type="email" class="form-control" id="EmailDRH" name="emailDRH" />
                    </div>
                    <div class="form-group">
                        <label for="TelephoneDRH">Téléphone DRH : </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="TelephoneDRH" name="telephoneDRH" />
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
    <!-- /.register-box -->

@endsection
