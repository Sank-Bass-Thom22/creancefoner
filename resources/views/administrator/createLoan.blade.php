@extends('layouts.app-master')

@section('content')

    <div class="create-box">
        <div class="card">
            <div class="card-body create-card-body">
                <p class="create-box-msg">
                <h1>Enregistrement d'un prêt</h1>
                </p><br />

                    @if ($errors->any())
                
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                
                @endif
                

                <p class="create-box-success">
                    @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <p class="create-box-fullname">
                    @if (session()->has('fullname'))
                <div class="alert alert-success">{{ session()->get('fullname') }}</div>
                @endif
                </p>

                <form action="{{ route ('storeloan') }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="Amount">Montant du prêt : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" required />
                    </div>
                    <div class="form-group ">
                        <label for="Academicyear">Année académique : </label>
                        <select id="Academicyear" class="form-control" name="academicyear" required>
                            @for($year=date('Y'); $year>2000; $year--)
                            <option value="{{ $year-1 }}-{{ $year }}">{{ $year-1 }}-{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
              

                        
                    <div class="form-group ">
                        <label for="Rate">Taux applicable : </label>
                        <select id="Rate" class="form-control" name="rate" required>
                            @forelse($allRate as $rates)
                            <option value="{{ $rates->id }}">{{ $rates->value }}</option>
                            @empty
                            <option>Aucun taux enregistré. 😞 </option>
                            @endforelse.
                        </select>
                    </div>

               

                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>
                        @if (session()->has('now'))

                        <a href="{{ route('createloannow', session()->get('id_debtor')) }}" class="btn mb-1 btn-danger">Retour</a>                    
                        @else

                        <a href="{{ route('registerdebtor') }}" class="btn mb-1 btn-danger">Retour</a>                    
                        @endif
                      
                    </div>
                </form>

            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.create-box -->

@endsection
