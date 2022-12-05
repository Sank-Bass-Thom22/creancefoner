@extends('layouts.app-master')

@section('content')

    <div class="updateemail-box">
        <div class="card">
            <div class="card-body updateemail-card-body">
                <p class="updateemail-box-msg">
                <h1>Modification email</h1>
                </p><br />

                <p class="updateemail-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updateemail-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('updateemployeremail', $employerProfile->id) }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <label for="Email">Adresse E-mail : </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $employerProfile->email }}" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="employer-box-close">
                    <form action="{{ route('showemployer', $employerProfile->id) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updateemail-box -->
@endsection
