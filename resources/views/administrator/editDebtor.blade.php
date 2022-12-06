@extends('layouts.app-master')

@section('content')

    <div class="updatefullname-box">
        <div class="card">
            <div class="card-body updatefullname-card-body">
                <p class="updatefullname-box-msg">
                <h1>Modification nom prénom</h1>
                </p><br />

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

                <form action="{{ route('updatedebtor', $debtorProfile->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Firstname">Prénom : </label>
                        <input type="text" class="form-control" id="Firstname" name="firstname" value="{{ $debtorProfile->firstname }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Lastname">Nom : </label>
                        <input type="text" class="form-control" id="Lastname" name="lastname" value="{{ $debtorProfile->lastname }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Email">Adresse E-mail : </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $debtorProfile->email }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Telephone">Numéro de téléphone : </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" value="{{ $debtorProfile->telephone }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Matricule">Numéro matricule : </label>
                        <input type="text" class="form-control" id="Matricule" name="matricule" value="{{ $debtorProfile->matricule }}" required />
                    </div>
                    <div class="input-group mb-3">
                            <label for="Serviceindex">Lieu de travail : </label>
                            <select id="Serviceindex" name="serviceindex" required>
                                <option></option>
                                @forelse($allServices as $services)
                                <option value="{{ $services->serviceindex }}">{{ $services->servicename }}</option>
                                @empty
                            </select><br />
                            <div class="">Aucune structure enregistrÃ©e! ðŸ˜ž </div>
                            @endforelse
                            </select>
                        </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="admin-box-close">
                    <form action="{{ route('alldebtor') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>

            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updatefullname-box -->

@endsection
