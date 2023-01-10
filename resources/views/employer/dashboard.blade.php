@extends('layouts.app-employer')

@section('content')



                <div class="row">
                    <div class="col-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-2">
                                <div class="media">
                                    <span class="card-widget__icon"></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">@money($totalLoan) F</h2>
                                        <h5 class="card-widget__subtitle">Total prêts</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-4">
                                <div class="media">
                                    <span class="card-widget__icon"></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">@money($totalInterest) F</h2>
                                        <h5 class="card-widget__subtitle">Total intérêts</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-6">
                                <div class="media">
                                    <span class="card-widget__icon"></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">@money($totalLoan + $totalInterest ) F</h2>
                                        <h5 class="card-widget__subtitle">Total due</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-9">
                                <div class="media">
                                    <span class="card-widget__icon"></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title">@money($totalPaid) F</h2>
                                        <h5 class="card-widget__subtitle">Total payé</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card card-widget">
                            <div class="card-body gradient-8">
                                <div class="media">
                                    <span class="card-widget__icon"></span>
                                    <div class="media-body">
                                        <h2 class="card-widget__title"> @money($totalLoan + $totalInterest - $totalPaid) F</h2>
                                        <h5 class="card-widget__subtitle">Reste à payer</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


@endsection
