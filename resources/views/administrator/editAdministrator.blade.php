@extends('layouts.app-master')

@section('content')

    <div class="updatefullname-box">
        <div class="card">
            <div class="card-body updatefullname-card-body">
                <p class="updatefullname-box-msg">
                <h1>Modification administrateur</h1>
                </p>

                <p class="updatefullname-box-error">
                    @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <strong class="alert alert-danger">{{ $error }}</strong><br />
                    @endforeach
                </ul><br />
                @endif
                </p>

                <p class="updatefullname-box-success">
                    @if (session()->get('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div><br />
                @endif
                </p>

                <form action="{{ route('updateadministrator', $administratorProfile->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Firstname">Prénom  </label>
                        <input type="text" class="form-control" id="Firstname" name="firstname" value="{{ $administratorProfile->firstname }}" required />
                    </div>
                    <div class="form-group">
                        <label for="Lastname">Nom  </label>
                        <input type="text" class="form-control" id="Lastname" name="lastname" value="{{ $administratorProfile->lastname }}" required />
                    </div>
                    <div class="form-group">
                        <label for="Email">Adresse E-mail  </label>
                        <input type="email" class="form-control" id="Email" name="email" value="{{ $administratorProfile->email }}" required />
                    </div>
                    <div class="form-group">
                        <label for="Telephone">Numéro de téléphone </label>
                        <input type="telephone" class="form-control" placeholder="226 " id="Telephone" name="telephone" value="{{ $administratorProfile->telephone }}" required />
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" 
                            name="role" required>
                            <option value="">Choisir role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ in_array($role->name, $userRole) 
                                        ? 'selected'
                                        : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
       
                        <button type="submit" class="btn mb-1 btn-primary">Valider</button>

                        @if ($administratorProfile->id == Auth::user()->id)
                 
                            <a href="{{ route('myprofile') }}" class="btn mb-1 btn-danger">Retour</a> 
                        @else
                    
                            <a href="{{ route('alladminsup') }}" class="btn mb-1 btn-danger">Retour</a> 
                        @endif


                                          
                    </div>
                </form>




            

            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.updatefullname-box -->

@endsection