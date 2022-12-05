@extends('layouts.app-master')

@section('content')

    <div class="updatematricule-box">
        <div class="card">
            <div class="card-body updatematricule-card-body">
                <p class="updatematricule-box-msg">
                <h1>Modification matricule</h1>
                </p><br />

                <p class="updatematricule-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updatematricule-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('updatedebtormatricule', $debtorProfile->id) }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <label for="Matricule">Numéro matricule : </label>
                        <input type="text" class="form-control" id="Matricule" name="matricule" value="{{ $debtorProfile->matricule }}" required />
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="admin-box-close">
                    <form action="{{ route('showdebtor', $debtorProfile->id) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updatematricule-box -->

@endsection
