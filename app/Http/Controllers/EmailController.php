<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(){
        return view('email');
    }
    public function uploadDocument(Request $request) {
        $title = $request->file('title');
        
        // Get the uploades file with name document
        $document = $request->file('document');
    
        // Required validation
        $request->validate([
            'document' => 'required'
        ]);
    
        // Check if uploaded file size was greater than 
        // maximum allowed file size
        if ($document->getError() == 1) {
            $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
            $error = 'The document size must be less than ' . $max_size . 'Mb.';
            return redirect()->back()->with('flash_danger', $error);
        }
        
        $data = [
            'document' => $document
        ];
        
        // If upload was successful
        // send the email
        $to_email = 'ramises.salanatin@trendmedia.ph';
        \Mail::to($to_email)
        ->send(new \App\Mail\Upload($data));
        return redirect()->back()->with('flash_success', 'Your document has been uploaded.');
    }
}
