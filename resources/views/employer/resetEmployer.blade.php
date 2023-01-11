@extends('layouts.app-employer')

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

                <form action="{{ route ('resetemployer', $resetEmployer->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Servicename">Nom de la structure : </label>
                        <input type="text" class="form-control" id="Servicename" name="servicename" value="{{ $resetEmployer->servicename }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Email">Adresse E-mail : </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $resetEmployer->email }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Telephone">Numéro de téléphone : </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" value="{{ $resetEmployer->telephone }}" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="employer-box-close">
                    <a href="{{ route('myprofile') }}" class="btn btn-danger">Retour</a>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updatefullname-box -->
@endsection
