@extends('layouts.app-employer')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Documents utilss</h4>

        <a href="{{ route('dashboard') }}" class="btn btn-danger btn-lg float-right" style="margin: 15px;">Retour</a>
        <table class="table header-border">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Fichier</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($showDocuments as $documents)

                <tr>
                    <td>{{ $loop->index + 1}} </td>
                    <td>{{ $documents->title }} </td>
                    <td> <a href="/storage/{{ $documents->filelink }}" class="" download="">Télécharger</a> </td>


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
