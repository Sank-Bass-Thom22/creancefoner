@extends('layouts.app-master')

@section('content')

    <div class="update-box">
        <div class="card">
            <div class="card-body update-card-body">
                <p class="update-box-msg">
                <h1>Modification d'un taux</h1>
                </p>

                <p class="update-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul>
                @endif
                </p>

                <p class="update-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <form action="{{ route ('updateratesup', $editRate->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Value">Valeur du taux : </label>
                        <input type="taux" class="form-control" id="Value" name="value" value="{{ $editRate->value }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Validity">Taux valide jusqu'en : </label>
                        <input type="date" class="form-control" id="Validity" name="validity" value="{{ $editRate->validity }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Description">Description : </label>
                        <textarea class="form-control" id="Description" name="description" rows="5" cols="50">
                        {{ $editRate->description }}
                        </textarea>
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="adminlist-box-close">
                    <form action="{{ route('showrate', $editRate->id) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.update-box -->

@endsection
