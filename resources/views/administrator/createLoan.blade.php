@extends('layouts.app-master')

@section('content')

    <div class="create-box">
        <div class="card">
            <div class="card-body create-card-body">
                <p class="create-box-msg">
                <h1>Enregistrement d'un prêt</h1>
                </p><br />

                <p class="create-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul>
                @endif
                </p>

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
                    <div class="input-group mb-3">
                        <label for="Amount">Montant du prêt : </label>
                        <input type="number" class="form-control" id="Amount" name="amount" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Startline">Date de contraction du prêt : </label>
                        <input type="date" class="form-control" id="Startline" name="startline" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Deadline">Date de cloture du prêt : </label>
                        <input type="date" class="form-control" id="Deadline" name="deadline" required />
                    </div>
                    <div class="input-group mb-3">
                        <label for="Rate">Taux applicable : </label>
                        <select id="Rate" name="rate" required>
                            @forelse($allRate as $rates)
                            <option value="{{ $rates->id }}">{{ $rates->value }}</option>
                            @empty
                            <option>Aucun taux enregistré. 😞 </option>
                            @endforelse.
                        </select>
                    </div>

                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">VALIDER</button>
                    </div>
                    <!-- /.col -->
                </form>

                <hr>

                <div class="adminlist-box-close">
                    @if (session()->has('now'))

                    <form action="{{ route('createloannow', session()->get('id_debtor')) }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>

                    @else

                    <form action="{{ route('registerdebtor') }}" method="GET">
                        @csrf

                        <button type="submit">FERMER</button>
                    </form>

                    @endif
                </div>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.create-box -->

@endsection
