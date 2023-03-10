@extends('layouts.app-master')

@section('content')

    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">
                <h1>Création d'un compte administrateur</h1>
                </p><br />

                <p class="register-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><strong class="alert alert-danger">{{ $error }}</strong></li>
                    @endforeach
                </ul>
                @endif
                </p>

                <p class="register-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route ('registeradminsup') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="Lastname">Nom </label>
                        <input type="text" class="form-control" id="Lastname" name="lastname" required />
                    </div>
                    <div class="form-group">
                        <label for="Firstname">Prénom </label>
                        <input type="text" class="form-control" id="Firstname" name="firstname" required />
                    </div>
                    <div class="form-group">
                        <label for="Telephone">Numéro de téléphone </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" required />
                    </div>
                    <div class="form-group">
                        <label for="Email">Adresse E-mail </label>
                        <input type="email" class="form-control" id="Email" name="email" required />
                    </div>
                   
                    <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" 
                        name="role" required>
                        <option value="">Choisir role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" >{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        <a href="{{ route('alladminsup') }}" class="btn mb-1 btn-danger">Retour</a>                    
                    </div>
                </form>

           
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->

@endsection
