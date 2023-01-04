@extends('layouts.app-debtor')

@section('content')


<table>
    <thead>
        <tr>
            <th>Total prêts</th>
            <th>Total intérêts</th>
            <th>Total due</th>
            <th>Total payé</th>
            <th>Reste à payer</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $totalLoan }}</td>
            <td>{{ $totalInterest }}</td>
            <td>{{ $totalLoan + $totalInterest }}</td>
            <td>{{ $totalPaid }}</td>
            <td>{{ ($totalLoan + $totalInterest) - $totalPaid }}</td>
        </tr>
    </tbody>
</table>
@endsection
