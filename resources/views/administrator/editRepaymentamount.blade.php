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
                <div class="form-group ">
                    <label for="Minamount">Montant minimal : </label>
                    <input type="number" class="form-control" id="Minamount" name="minamount" value="{{ $editRepaymentamount->minamount }}" required />
                </div>
                <div class="form-group ">
                    <label for="Maxamount">Montant maximal : </label>
                    <input type="number" class="form-control" id="Maxamount" name="maxamount" value="{{ $editRepaymentamount->maxamount }}" required />
                </div>
                <div class="form-group ">
                    <label for="Description">Description : </label>
                    <textarea class="form-control" id="Description" name="description" rows="5" cols="50">
                    {{trim($editRepaymentamount->description)}}
                    </textarea>
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
<!-- /.update-box -->

@endsection
