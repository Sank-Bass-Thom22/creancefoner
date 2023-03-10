<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Debtor\Debtor;
use App\Http\Requests\SearchRequest;

class ResearchController extends Controller
{
    public function researchdebtor(SearchRequest $request)
    {
        $validatedData = $request->validated();
        $key = $request->get('research');

        $allDebtor = Debtor::where([['firstname', 'like', $key], ['role', 'Debtor']])
            ->orWhere([['lastname', 'like', $key], ['role', 'Debtor']])
            ->orderBy('created_at', 'DESC')->paginate(10);

        $message = 'Il n\'y a aucun redevable enregistrĂ©.';

        return view('administrator.allDebtor', compact(['allDebtor', 'message']));
    }
}
