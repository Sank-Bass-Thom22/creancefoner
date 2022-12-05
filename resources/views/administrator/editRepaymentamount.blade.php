@extends('layouts.app-master')

@section('content')

    <div class="update-box">
        <div class="card">
            <div class="card-body update-card-body">
                <p class="update-box-msg">
                <h1>Modification d'une grille</h1>
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

                <form action="{{ route ('updaterepaymentamountsup', $editRepaymentamount->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="Minamount">Montant minimal : </label>
                        <input type="number" class="form-control" id="Minamount" name="minamount" value="{{ $editRepaymentamount->minamount }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Maxamount">Montant maximal : </label>
                        <input type="number" class="form-control" id="Maxamount" name="maxamount" value="{{ $editRepaymentamount->maxamount }}" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Description">Description : </label>
                        <textarea class="form-control" id="Description" name="description" rows="5" cols="50">
                        {{ $editRepaymentamount->description }}
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
                    <form action="{{ route('showrepaymentamount', $editRepaymentamount->id) }}" method="GET">
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
