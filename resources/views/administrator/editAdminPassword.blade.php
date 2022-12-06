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

                        <div class="input-group mb-3">
                        <label for="Oldpassword">Mot de passe actuel : </label>
                        <input id="Oldpassword" class="form-control" type="password" name="oldpassword" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password">Nouveau mot de passe : </label>
                        <input id="Password" class="form-control" type="password" name="password" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Password_confirmation">Confirmez le nouveau mot de passe : </label>
                        <input id="Password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                    </div>

                                        <!-- /.col -->
                                        <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                    </form>

                    <hr>

                    <div class="">
                        <a href="{{ route ('myprofile') }}">FERMER</a>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection
