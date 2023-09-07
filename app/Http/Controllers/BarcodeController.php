<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorJPG;


class BarcodeController extends Controller
{
    public function generate(Request $request)
    {
        if ($request->isMethod('post')) {
            $text = $request->input('text_input');
            $generator = new BarcodeGeneratorJPG();
            $barcodeData = $generator->getBarcode($text, $generator::TYPE_CODE_128);

            $jpgPath = public_path('barcode.jpg');
            file_put_contents($jpgPath, $barcodeData);

            $image = imagecreatefromjpeg($jpgPath);
            imagewebp($image, public_path('barcode.webp'));
            imagedestroy($image);

            return view('barcode', ['text' => $text]);
        }

        return view('barcode');
    }
}
