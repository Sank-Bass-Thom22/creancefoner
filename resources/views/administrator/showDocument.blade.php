@extends('layouts.app-master')

@section('content')

    <div class="showdocument-box">
        <div class="card">
            <div class="card-body showdocument-card-body">
                <p class="showdocument-box-msg">
                <h1 class="">Détail document</h1>
                </p>

                <p class="showdocument-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                </p>

                <ul class="">
                    <li>TITRE : {{ $showDocument->title }}</li>
                    <li>FICHIER : {{ $showDocument->filelink }}</li>
                    <li>Description : {{ $showDocument->description }}</li>
                </ul>

                <hr>

                <div class="showdocument-box-close">
                    <table>
                        <tr>
                            @if (Auth::user()->role === "SuperAdmin")
                            <td>
                                <form action="{{ route ('editdocument', $showDocument->id) }}" method="GET">
                                    @csrf

                                    <button type="submit" class="">MODIFIER</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('destroydocument', $showDocument->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="">SUPPRIMER</button>
                                </form>
                            </td>
                            @endif
                            <td>
                                <form action="{{ route('alldocument') }}" method="GET">
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
