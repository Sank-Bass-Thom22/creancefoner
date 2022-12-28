@extends('layouts.app-employer')

@section('content')



    <div class="employeslist-box">
        <div class="card">
            <div class="card-body employeslist-card-body">
                <p class="employeslist-box-msg">
                <h1 class="">Mes employés</h1>
                </p><br />

                <p class="myemployesbox-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <a href="{{ route('dashboard') }} " class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
                <div class="table-responsive">
            <table class="table header-border">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & prénom (s)</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Code Foner</th>
                        <th>Montant Prêts</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($myEmployes as $employes)
                <tr>
                        <td>{{ $loop->index + 1}} </td>
                        <td>{{ $employes->firstname }} {{ $employes->lastname }}</td>
                        <td>{{ $employes->email }}</td>
                        <td>{{ $employes->telephone }}</td>
                        <td>{{ $employes->codefoner }}</td>
                        <td>
                            @php
                                $totalDue=0;
                                $totalPaid=0;
                            @endphp
                            @foreach ($employes->loans as $loan)
                            @php
                                $totalDue+= $loan->amount+($loan->amount*$loan->rate->value/100)
                            @endphp
                            
                            @endforeach
                             @money($totalDue) Francs CFA


                        </td>
                        <td>
                            <a href="{{ route ('myemployeloans', $employes->id) }}">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-ppt" viewBox="0 0 16 16">
                                    <path d="M7 5.5a1 1 0 0 0-1 1V13a.5.5 0 0 0 1 0v-2h1.188a2.75 2.75 0 0 0 0-5.5H7zM8.188 10H7V6.5h1.188a1.75 1.75 0 1 1 0 3.5z"/>
                                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                </svg>
                            </a>
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
    </div>
@endsection
