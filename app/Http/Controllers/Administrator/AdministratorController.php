<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Support\Str;
use App\Models\Debtor\Debtor;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\StoreAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;

class AdministratorController extends Controller
{
    public function index()
    {
        $currentAdminId = Auth::user()->id;

        $allAdministrator = Debtor::whereNotIn('role', ['Employer', 'Debtor'])
            ->where('id', '<>', $currentAdminId)
            ->orderBy('firstname', 'ASC')->paginate(10);

        return view('administrator.allAdministrator', compact('allAdministrator'));
    }

    public function create()
    {
      
        $roles = Role::latest()->get();
        return view('administrator.registerAdmin', compact('roles'));
    }

    public function store(StoreAdministratorRequest $request)
    {
        $credentialsValidated = $request->validated();
        $password = Str::random(8);

        $user= Debtor::create([
            'firstname' => ucwords(strtolower($request->firstname)),
            'lastname' => ucwords(strtolower($request->lastname)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
            'password' => Hash::make($password),
        ]);


        $user->assignRole([$request->role]);
       

        return redirect()->route('registeradminsup')->with('success', 'Succès! :-) /Password : ' . $password);
    }

    public function editpassword()
    {
        return view('administrator.editAdminPassword');
    }

    public function edit($id)
    {
        $administratorProfile = Debtor::find($id);

        return view('administrator.editAdministrator', [
            'administratorProfile' => $administratorProfile,
            'userRole' => $administratorProfile->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);

       
    }

    public function update(UpdateAdministratorRequest $request, $id)
    {
        $validatedData = $request->validated();

        Debtor::whereId($id)->update([
            'firstname' => ucwords(strtolower($request->firstname)),
            'lastname' => ucwords(strtolower($request->lastname)),
            'email' => strtolower($request->email),
            'telephone' => $request->telephone,
        ]);

        $user=Debtor::whereId($id)->first();

        $user->syncRoles($request->role);

        if ($id == Auth::user()->id) {
            return redirect()->route('myprofile')->with('success', 'Informations modifiées avec succès! :-)');
        } else {
            return redirect()->route('alladminsup', $id)->with('success', 'Informations modifiées avec succès! :-)');
        }
    }

    public function updatepassword(UpdatePasswordRequest $request)
    {
        $id = Auth::user()->id;
        $message = '';

        $validatedData = $request->validated();
        $hashedPassword = Debtor::whereId($id)->value('password');

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            Debtor::whereId($id)->update([
                'password' => Hash::make($request->password),
            ]);

            $message = 'Mot de passe modifiées avec succès! :-)';
        } else {
            $message = 'Le mot de passe entré est incorrect.';
        }

        return redirect()->route('myprofile')->with('success', $message);
    }

    public function regenerate($id)
    {
        $newPassword = Str::random(8);

        Debtor::whereId($id)->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('alladminsup', $id)->with('success', 'Succès! Le nouveau mot de passe est : ' . $newPassword);
    }

    public function destroy($id)
    {
        $administratorProfile = Debtor::find($id);
        $administratorProfile->delete();

        return redirect()->route('alladminsup')->with('success', 'Administrateur supprimé avec succès!');
    }
}
