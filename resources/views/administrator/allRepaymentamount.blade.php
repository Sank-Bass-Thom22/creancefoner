@extends('layouts.app-master')

@section('content')





<div class="card">
    <div class="card-body">
        <h4 class="card-title">Grille</h4>

        <p>
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                       <p class="alert alert-danger">{{ $error }}</p>
                                        @endforeach
                                    </ul>
                                @endif
                                </p>

        <p class="showdocument-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
        @if (Auth::user()->role == "SuperAdmin")
        <a href="{{ route ('createrepaymentamountsup') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;">Nouveau</a>
        @else
        <a href="#" class="" disabled="disabled">Nouveau</a>
        @endif
        <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Montant Minimal</th>
                        <th>Montant Maximal</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allRepaymentamount as $repaymentamounts)

                    <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $repaymentamounts->minamount }} Francs CFA</td>
                        <td>{{ $repaymentamounts->maxamount }} Francs CFA</td>
                        <td>{{ $repaymentamounts->description }}</td>
                        <td>
                            @if (Auth::user()->role == "SuperAdmin")
                            <a href="{{ route('editrepaymentamountsup', $repaymentamounts->id) }}" class="">MODIFIER</a>
                            @else
                            <a href="#" class="" disabled="disabled">MODIFIER</a>
                            @endif
                        </td>
                        <td>
                            @if (Auth::user()->role == "SuperAdmin")
                            <a href="{{ route('destroyrepaymentamountsup', $repaymentamounts->id) }}" class="">SUPPRIMER</a>
                            @else
                            <a href="#" class="" disabled="disabled">SUPPRIMER</a>
                            @endif
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="5"></td>

                    </tr>

                    @endforelse




                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
