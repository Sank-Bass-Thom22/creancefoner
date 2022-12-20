@extends('layouts.app-master')

@section('content')

    <div class="updaterepayment-box">
        <div class="card">
            <div class="card-body updaterepayment-card-body">
                <p class="updaterepayment-box-msg">
                <h1>Modification d'un remboursement</h1>
                </p><br />

                <p class="updaterepayment-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updaterepayment-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <p class="updaterepayment-box-fullname">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <form action="{{ route ('updaterepayment', $debtorRepayment->id) }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="Amount">Montant du remboursement : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" value="{{ $debtorRepayment->amount }}" required />
                    </div>
                    <div class="form-group ">
                        <label for="Repaymentdate">Date du remboursement : </label>
                        <input type="date" class="form-control" id="Repaymentdate" name="repaymentdate" value="{{ $debtorRepayment->repaymentdate }}" required />
                    </div>
                    <div class="form-group ">
                        <label for="Repaymentway">Méthode de remboursement : </label>
                        <select id="Repaymentway" class="form-control" name="repaymentway" required>
                            <option value=""></option>
                            <option value="En espèces">En espèces</option>
                            <option value="Virement banquaire">Par virement banquaire</option>
                            <option value="Par checque">Par checque</option>
                        </select>
                    </div>

            

                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        <a href="{{ route('showrepayment', $debtorRepayment->id_debtor) }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
                </form>

         
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updaterepayment-box -->

@endsection
