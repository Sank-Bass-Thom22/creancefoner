@extends('layouts.app-master')

@section('content')

    <div class="updatefullname-box">
        <div class="card">
            <div class="card-body updatefullname-card-body">
                <p class="updatefullname-box-msg">
                <h1>Modification nom prénom</h1>
                </p>

                <p class="updatefullname-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updatefullname-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route('updatefullname', $administratorProfile->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Firstname">Prénom : </label>
                        <input type="text" class="form-control" id="Firstname" name="firstname" value="{{ $administratorProfile->firstname }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Lastname">Nom : </label>
                        <input type="text" class="form-control" id="Lastname" name="lastname" value="{{ $administratorProfile->lastname }}" required />
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
    <!-- /.updatefullname-box -->

@endsection
