@extends('layouts.app-debtor')

@section('content')
    <div class="simulate-box">
        <div class="card">
            <div class="card-body simulate-card-body">
                <p class="simulate-box-title">
                <h1>Simulation d'un échéancier</h1>
                </p><br />

                <p class="simulate-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li><br />
                    @endforeach
                </ul>
                @endif
                </p>

                <section class="main">
                    <p class="simulate-box-msg">
                        @if (isset($message))
                    <div class="alert alert-success">{{ $message }}</div><br />
                    @endif
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <h3>Calculez la durée de votre remboursement</h3><br />

                            <form method="POST" action="{{ route('makesimulationwithamount') }}">
                                @csrf

                                <div class="form-group ">
                                    <label for="Amount">Montant de l'échéancier : </label>
                                    <input type="number" class="form-control" id="Amount" name="amount" required />
                                </div>

                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                                </div>
                                <!-- /.col -->
                            </form>
                        </div><br /><br />

                        <div class="col-md-6">
                            <h3>Calculez le montant de votre remboursement</h3><br />

                            <form method="POST" action="{{ route('makesimulationwithdate') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="Mounths">Nombre de mois : </label>
                                    <select class="form-control" id="Mounths" name="mounths" required>
                                        @for ($counter=0; $counter <= 120; $counter++) <option value="{{ $counter }}">{{ $counter }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Years">Nombre d'année : </label>
                                    <select id="Years" class="form-control" name="years" required>
                                        @for ($counter=0; $counter<=10; $counter++) <option value="{{ $counter }}">{{ $counter }}</option>
                                            @endfor
                                    </select>
                                </div>

                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                                </div>
                                <!-- /.col -->
                            </form>
                        </div>
                    </div><br />

                    <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
                </section>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.simulate-box -->

@endsection
