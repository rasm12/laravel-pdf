<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

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

        $file = $request->file('file');


        //Move Uploaded File
        $destinationPath = 'uploads';
        //$file->move($destinationPath, $file->getClientOriginalName());

        if ($file->getMimeType() != 'application/pdf'){
            return 'Tipo de archivo no permitido';
        }

        $info = 'File name: ' . $file->getClientOriginalName() . '<br>';
        $info .= 'File extension: ' . $file->getClientOriginalExtension() . '<br>';
        $info .= 'Path Local: ' . $file->getRealPath() . '<br>';
        $info .= 'File Size: ' . $file->getSize() . '<br>';
        $info .= 'File Tipo: ' . $file->getMimeType() . '<br>';
        $info .= 'Contenido: <br>';

        \Log::info("$info");


        $parser = new \Smalot\PdfParser\Parser();
        $sourcefile = public_path() . '\\uploads\\' . $file->getClientOriginalName();

        $pdf = $parser->parseFile($file->getPathName());
        try
        {
            $text = $pdf->getText();
            //$text = str_replace('\t', '<p/>', $text);
//
//            foreach (preg_split("/((\r?\n)|(\r\n?))/", $text) as $line)
//            {
//                
//            }

            \Log::info("texto");

            return $text;
        } catch (Exception $ex)
        {
            return $ex->getMessage();
        }


        return $info;
    }

    public function generate()
    {

        // $text = (new \Spatie\PdfToText\Pdf())
        //         ->setPdf(public_path() . '\\uploads\\api.pdf')
        //         ->text();


        return Pdf::getText('api.pdf');
    }

}
