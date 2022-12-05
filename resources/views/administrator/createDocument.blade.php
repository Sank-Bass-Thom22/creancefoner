@extends('layouts.app-master')

@section('title')
Importation d'un document
@endsection

@section('content')

    <div class="create-box">
        <div class="card">
            <div class="card-body create-card-body">
                <p class="create-box-msg">
                <h1>Importation d'un document</h1>
                </p>

                <p class="create-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>

                    @endforeach
                </ul>
                @endif
                </p>

                <p class="create-box-success">
                    @if (session()->get('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                </p>

                <form action="{{ route ('storedocument') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Title">Titre du document</label>
                        <input type="text" class="form-control input-default" id="Title" name="title" required />
                    </div>
                    <div class="form-group">
                        <label for="Document">Selectionner le document</label>
                        <input type="file" class="form-control" id="Document" name="document" required />
                    </div>

                
                    <div class="form-group">
                        <label for="Description">Description </label>
                        <textarea class="form-control h-150px" rows="6" id="Description" name="description" ></textarea>
                    </div>

                    <!-- /.col -->
                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        <a href="{{ route('alldocument') }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
                    <!-- /.col -->
                </form>

            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.create-box -->

@endsection
