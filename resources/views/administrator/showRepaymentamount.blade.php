@extends('layouts.app-master')

@section('content')

    <div class="showrepaymentamount-box">
        <div class="card">
            <div class="card-body showrepaymentamount-card-body">
                <p class="showrepaymentamount-box-msg">
                <h1 class="">Détail grille</h1>
                </p>

                <p class="showrepaymentamount-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <ul class="">
                    <li>MONTANT MINIMAL : {{ $showRepaymentamount->minamount }} Francs CFA</li>
                    <li>MONTANT MAXIMAL : {{ $showRepaymentamount->maxamount }} Francs CFA</li>
                    <li>Description : {{ $showRepaymentamount->description }}</li>
                </ul>

                <hr>

                <div class="showrepaymentamount-box-close">
                    <table>
                        <tr>
                            @if (Auth::user()->role === "SuperAdmin")
                            <td>
                                <form action="{{ route ('editrepaymentamountsup', $showRepaymentamount->id) }}" method="GET">
                                    @csrf

                                    <button type="submit" class="">MODIFIER</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('destroyrepaymentamountsup', $showRepaymentamount->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="">SUPPRIMER</button>
                                </form>
                            </td>
                            @endif
                            <td>
                                <form action="{{ route('allrepaymentamount') }}" method="GET">
                                    @csrf

                                    <button type="submit" class="">FERMER</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
