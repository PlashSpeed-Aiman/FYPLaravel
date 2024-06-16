<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\DocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    private Request $request;
    private Auth $auth;

    private DocumentService $documentService;

    public function __construct(Request $request, Auth $auth, DocumentService $documentService)
    {
        $this->request = $request;
        $this->auth = $auth;
        $this->documentService = $documentService;
    }

    public function uploadDocument(){

        $this->request->validate([
            'files.*' => 'required|file|mimes:pdf,docx,doc,jpg,png',
            'case_id' => 'required|exists:cases,id'
        ]);

        foreach ( $this->request->file('files') as $file) {
            $document = $this->documentService->storeDocument($file,  $this->request->case_id);
        }
        return response()->json(['msg'=>'Documents uploaded successfully']);
    }

    public function deleteDocument($documentId){
        $this->documentService->deleteDocument($documentId);
        return response()->json(['msg'=>'Documents deleted successfully']);
    }
}
