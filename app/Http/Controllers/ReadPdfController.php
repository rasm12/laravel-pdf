<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadPdfController extends Controller {

    public function read(Request $request)
    {




        $parser = new \Smalot\PdfParser\Parser();
        $sourcefile = $request->pathDocument;

        $pdf = $parser->parseFile($sourcefile);
        $text = $pdf->getText();

        return $text;
    }

    public function showUploadFile(Request $request)
    {

        //return json_encode($request->hasFile('file'));
        $file = $request->file('file');



        //Display File Name
//        echo 'File Name: ' . $file->getClientOriginalName();
//        echo '<br>';
//
//        //Display File Extension
//        echo 'File Extension: ' . $file->getClientOriginalExtension();
//        echo '<br>';
//
//        //Display File Real Path
//        echo 'File Real Path: ' . $file->getRealPath();
//        echo '<br>';
//
//        //Display File Size
//        echo 'File Size: ' . $file->getSize();
//        echo '<br>';
//
//        //Display File Mime Type
//        echo 'File Mime Type: ' . $file->getMimeType();
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());



        $parser = new \Smalot\PdfParser\Parser();
        $sourcefile = public_path() . '\\uploads\\' . $file->getClientOriginalName();

        $pdf = $parser->parseFile($sourcefile);
        try {
            $text = $pdf->getText();
        } catch (Exception $ex) {
            return 0;
        }
        

        return $text;
    }

}
