<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Loan\Document;

class EmpDocumentController extends Controller
{
    public function show()
    {
        $showDocuments = Document::select('title', 'filelink')->orderBy('title', 'ASC')->get();

        return view('debtor.documents', compact('showDocuments'));
    }
}
