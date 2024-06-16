<?php

namespace App\Services;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    public function storeDocument($file,$caseId){
        $path = $file->store('documents');
        $document = new Document();
        $document->cases_id = $caseId;
        $document->document_path = $path;
        $document->document_name = $file->getClientOriginalName();
        $document->save();

        return $document;
    }

    public function downloadDocument($documentId){

       $document = Document::findOrFail($documentId);
       return Storage::download($document->document_path,$document->document_name);
    }

    public function deleteDocument($documentId)
    {
        $document = Document::findOrFail($documentId);
        Storage::delete($document->document_path);
        $document->delete();

    }

}
