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

            <p><a href="{{ route('dashboard') }}">FERMER</a></p>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
<!-- /.create-box -->

@endsection
