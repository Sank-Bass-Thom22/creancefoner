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

        $result = Debtor::where([['firstname', 'like', $key], ['role', 'Debtor']])
            ->orWhere([['lastname', 'like', $key], ['role', 'Debtor']])
            ->orderBy('created_at', 'DESC')->get();

        $allDebtor = Debtor::where('role', 'Debtor')->select('id', 'firstname', 'lastname')
            ->orderBy('firstname', 'ASC')->get();
        $message = 'Il n\'y a aucun redevable enregistré.';

        return view('administrator.allDebtor', compact(['allDebtor', 'message', 'result', 'key']));
    }
}
