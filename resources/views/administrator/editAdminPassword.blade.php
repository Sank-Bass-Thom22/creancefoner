@extends('layouts.app-master')

@section('content')
    <div class="admindetail-box">
        <div class="card">
            <div class="card-body admindetail-card-body">
                <p class="admindetail-box-msg">
                <h1 class="">Modification du mot de passe</h1>
                </p><br />

                <p class="admindetail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <section class="main">
                    <form action="{{ route ('updateadminpassword') }}" method="POST">
                        @csrf

                        <div class="form-group ">
                        <label for="Oldpassword">Mot de passe actuel : </label>
                        <input id="Oldpassword" class="form-control" type="password" name="oldpassword" required />
                    </div>
                    <div class="form-group ">
                        <label for="Password">Nouveau mot de passe : </label>
                        <input id="Password" class="form-control" type="password" name="password" required />
                    </div>
                    <div class="form-group ">
                        <label for="Password_confirmation">Confirmez le nouveau mot de passe : </label>
                        <input id="Password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                    </div>

                                 

                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        <a href="{{ route ('myprofile') }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
                    </form>

                </section>

            </div>
        </div>
    </div>

@endsection
