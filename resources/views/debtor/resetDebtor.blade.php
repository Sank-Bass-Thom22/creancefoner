@extends('layouts.app-debtor')

@section('content')
<div class="updatefullname-box">
    <div class="card">
        <div class="card-body updatefullname-card-body">
            <p class="updatefullname-box-msg">
            <h1>Modification profile</h1>
            </p><br />

            <p class="updatefullname-box-error">
                @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <strong class="alert alert-danger">{{ $error }}</strong><br />
                @endforeach
            </ul>
            @endif
            </p>

            <p class="updatefullname-box-success">
                @if (session()->get('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div><br />
            @endif
            </p>

            <form action="{{ route ('resetdebtor', $resetDebtor->id) }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <label for="Firstname">Prénom : </label>
                    <input type="text" class="form-control" id="Firstname" name="firstname" value="{{ $resetDebtor->firstname }}" required />
                </div>
                <div class="input-group mb-3">
                    <label for="Lastname">Nom : </label>
                    <input type="text" class="form-control" id="Lastname" name="lastname" value="{{ $resetDebtor->lastname }}" required />
                </div>
                <div class="input-group mb-3">
                    <label for="Email">Adresse E-mail : </label>
                    <input type="email" class="form-control" id="Email" name="email" value="{{ $resetDebtor->email }}" required />
                </div>
                <div class="input-group mb-3">
                    <label for="Telephone">Numéro de téléphone : </label>
                    <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" value="{{ $resetDebtor->telephone }}" required />
                </div>
                <div class="input-group mb-3">
                    <label for="Matricule">Numéro matricule : </label>
                    <input type="text" class="form-control" id="Matricule" name="matricule" value="{{ $resetDebtor->matricule }}" required />
                </div>
                <div class="input-group mb-3">
                    <input type="hidden" id="Serviceindex" name="serviceindex" value="{{ $resetDebtor->debtorindex }}" />
                </div>

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                </div>
                <!-- /.col -->
            </form>

            <hr>

            <div class="debtor-box-close">
                <a href="{{ route('myprofile') }}" class="">FERMER</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
<!-- /.updatefullname-box -->

@endsection
