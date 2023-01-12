@extends('layouts.app-master')

@section('content')

<div class="create-box">
    <div class="card">
        <div class="card-body create-card-body">
            <p class="create-box-msg">
            <h1>Enregistrement d'un taux</h1>
            </p>

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
                @if (session()->get('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            </p>

            <form action="{{ route ('storeratesup') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Value">Valeur du taux </label>
                    <input type="taux" class="form-control" id="Value" name="value" required />
                </div>
                <div class="form-group">
                    <label for="Validity">Taux valide jusqu'en </label>
                    <select id="Validity" class="form-control" name="validity">
                        <option value=""></option>
                        @for($year=date('Y'); $year>2000; $year--)
                        <option value="{{ $year-1 }}-{{ $year }}">{{ $year-1 }}-{{ $year }}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                    <a href="{{ route('allrate') }}" class="btn mb-1 btn-danger">Retour</a>
                </div>
            </form>


        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.card -->
</div>
<!-- /.create-box -->

@endsection
