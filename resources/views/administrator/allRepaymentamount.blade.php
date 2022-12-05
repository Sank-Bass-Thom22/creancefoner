@extends('layouts.app-master')

@section('content')





                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Grille</h4>
                                <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>  
                                <a href="{{ route ('createrepaymentamountsup') }}" class="btn btn-primary btn-lg float-right" style="margin: 15px;" >Nouveau</a>
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th>#</th>    
                                                <th>Montant Minimun</th>
                                                <th>Montant Maximal</th>
                                                <th>Option Suplémentaire</th>
                                                                                              
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($allRepaymentamount as $repaymentamounts)
                   
                                            <tr>
                                                <td>{{ $loop->index + 1}} </td>
                                                <td>{{ $repaymentamounts->minamount }} Francs CFA</td>
                                                <td>{{ $repaymentamounts->maxamount }} Francs CFA</td>
                                                <td><a href="{{ route('showrepaymentamount', $repaymentamounts->id) }}" class="">VOIR PLUS</a></td>
                                                <td></td>
                                             
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