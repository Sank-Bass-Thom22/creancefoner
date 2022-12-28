@extends('layouts.app-master')

@section('title')
Enregistrement d'une banque
@endsection

@section('content')

<div class="create-box">
    <div class="card">
        <div class="card-body create-card-body">
            <p class="create-box-msg">
            <h1>Enregistrement d'une banque</h1>
            </p>

            <p class="create-box-error">
                @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </ul>
            @endif
            </p>

            <p class="create-box-success">
                @if (session()->get('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            </p>

            <form action="{{ route('updatebank', $editBank->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="Name">Nom de la banque : </label>.
                    <input type="text" id="Name" class="form-control" name="name" value="{{ $editBank->name }}" required />
                </div>
                <div class="form-group">
                    <label for="Email">Adresse email : </label>
                    <input type="email" id="Email" class="form-control" name="email" value="{{ $editBank->email }}" />
                </div>
                <div class="form-group">
                    <label for="Telephone">Numéro de téléphone : </label>
                    <input type="text" id="Telephone" class="form-control" name="telephone" value="{{ $editBank->telephone }}" />
                </div>
                <div class="form-group">
                    <label for="Description">Description : </label>
                    <textarea class="form-control" id="Description" name="description" rows="5" cols="50">
                    {{ $editBank->description }}
                    </textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                    <a href="{{ route('allbank') }}" class="btn mb-1 btn-danger">Retour</a>
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
<!-- /.create-box -->

@endsection
