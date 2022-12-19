<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Loan\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $allDocument = Document::orderBy('title', 'ASC')->get();

        return view('administrator.allDocument', compact('allDocument'));
    }

    public function create()
    {
        return view('administrator.createDocument');
    }

    public function store(StoreDocumentRequest $request)
    {
        $validatedData = $request->validated();

        $filename = $request->document->getClientOriginalName();
        $filelink = $request->document->storeAs('USEFUL-DOCUMENTS', $filename, 'public');

        Document::create([
            'title' => $request->title,
            'filelink' => $filelink,
            'description' => $request->description,
        ]);

        return redirect()->route('alldocument')->with('success', 'Document importé avec succès! :-)');
    }

    public function edit($id)
    {
        $editDocument = Document::select('id', 'title', 'description')->findOrFail($id);

        return view('administrator.editDocument', compact('editDocument'));
    }

    public function update(UpdateDocumentRequest $request, $id)
    {
        $validatedData = $request->validated();

        $filename = $request->document->getClientOriginalName();
        $newfilelink = $request->document->storeAs('USEFUL-DOCUMENTS', $filename, 'public');

        Document::whereId($id)->update([
            'title' => $request->title,
            'filelink' => $newfilelink,
            'description' => $request->description,
        ]);

        return redirect()->route('alldocument')->with('success', 'Modification effectuée avec succès! :-)');
    }

    public function destroy($id)
    {
        $singleDocument = Document::findOrFail($id);

        if (Storage::exists($singleDocument->filelink)) {
            Storage::delete($singleDocument->filelink);
        }
        $singleDocument->delete();

        return redirect()->route('alldocument')->with('success', 'Document supprimé avec succès! :-)');
    }
}
