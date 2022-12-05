@extends('layouts.app-debtor')

@section('content')

    <div class="defineschedule-box">
        <div class="card">
            <div class="card-body defineschedule-card-body">
                <p class="defineschedule-box-msg">
                <h1>Enregistrement d'un échéancier</h1>
                </p><br />

                <p class="defineschedule-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="defineschedule-box-success">
                    @if (isset($message))
                <div class="alert alert-success">{{ $message }}</div><br />
                @endif
                </p>

                <section class="main">
                    <form action="{{ route ('saveschedule') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="Amount">Montant de l'échéancier : </label>
                            <input type="number" class="form-control" id="Amount" name="amount" required />
                        </div>

               

                        <div class="form-group">
       
                            <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                            <a href="{{ route('myrepayments') }}" class="btn mb-1 btn-danger">Retour</a>                    
                        </div>
                    </form>

                 
                </section>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.defineschedule-box -->

@endsection
