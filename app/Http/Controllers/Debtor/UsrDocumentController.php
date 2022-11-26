<?php

namespace App\Http\Controllers\Debtor;

use App\Http\Controllers\Controller;
use App\Models\Loan\Document;

class UsrDocumentController extends Controller
{
    public function show()
    {
        $showDocuments = Document::select('title', 'filelink')->orderBy('title', 'ASC')->get();

        return view('debtor.documents', compact('showDocuments'));
    }
}
