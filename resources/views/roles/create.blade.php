@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Nouveau rôle</h1>


        <div class="container mt-4">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Désignation</label>
                    <input value="{{ old('name') }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Désignation" required>
                </div>

                <label for="permissions" class="form-label">Associer  Permissions</label>

                <table class="table table-striped">
                    <thead>
                        <th scope="col" ><input type="checkbox" name="all_permission"></th>
                        <th scope="col" >Permission</th>
                    </thead>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox"
                                name="permission[{{ $permission->name }}]"
                                value="{{ $permission->name }}"
                                class='permission'>
                            </td>
                            <td>{{ $permission->name_fr }}</td>

                        </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('dashboard') }}" class="btn mb-1 btn-danger">Retour</a>

            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
