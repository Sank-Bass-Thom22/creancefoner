@extends('layouts.app-master')

@section('content')

    <div class="updatepassword-box">
        <div class="card">
            <div class="card-body updatepassword-card-body">
                <p class="updatepassword-box-msg">
                <h1>Modification mot de passe</h1>
                </p><br />

                <p class="updatepassword-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updatepassword-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('updatepassword', $administratorProfile->id) }}" method="POST">
                    @csrf

                    <div class="">
                        <label for="Oldpassword">Mot de passe actuel : </label>
                        <input id="Oldpassword" class="" type="password" name="oldpassword" required />
                    </div>
                    <div class="">
                        <label for="Password">Nouveau mot de passe : </label>
                        <input id="Password" class="" type="password" name="password" required />
                    </div>
                    <div class="">
                        <label for="Password_confirmation">Confirmez le nouveau mot de passe : </label>
                        <input id="Password_confirmation" class="" type="password" name="password_confirmation" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="admin-box-close">
                    @if ($administratorProfile->id == Auth::user()->id)
                    <form action="{{ route('myadminprofile') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                    @else
                    <form action="{{ route('showadminsup', $administratorProfile->id) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                    @endif
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updatepassword-box -->

@endsection