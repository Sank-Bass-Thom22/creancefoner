@extends('layouts.app-master')

@section('content')

    <div class="create-box">
        <div class="card">
            <div class="card-body create-card-body">
                <p class="create-box-msg">
                <h1>Enregistrement d'une grille</h1>
                </p>

                <p class="create-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul>
                @endif
                </p>

                <p class="create-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <form action="{{ route ('storerepaymentamountsup') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Minamount">Montant minimal </label>
                        <input type="number" class="form-control" id="Minamount" name="minamount" required />
                    </div>
                  
                    <div class="form-group">
                        <label for="Description">Description </label>
                        <textarea class="form-control" id="Description" name="description" rows="5" cols="50"></textarea>
                    </div>

                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        <a href="{{ route('allrepaymentamount') }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
                </form>

                
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.create-box -->

@endsection
