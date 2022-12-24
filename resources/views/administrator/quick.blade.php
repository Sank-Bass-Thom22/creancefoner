@extends('layouts.app-master')

@section('content')

<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h1>Sélectionner le redevable</h1>

                <select id="" name="">
                    <option></option>
                @forelse ($debtors as $debtor)
                <option>
                    {{ $debtor->firstname }} {{ $debtor->lastname }}
                    @forelse ($debtor->loans as $loan)
                    {{ $loan->amount }}
                    @empty
                    <p>Aucun prêt</p>
                    @endforelse
                </option>
                @empty
                <p>Aucun redevable</p>
                @endforelse
                </select>
            </div>
        </div>
    </div>
</div>
@endsection
