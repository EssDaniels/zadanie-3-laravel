<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorJPG;
use Illuminate\Support\Facades\Storage;


class BarcodeController extends Controller
{
    public function index()
    {
        return view('barcode');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'text_input' => 'required|string|max:255',
        ]);

        $text = $request->input('text_input');
        $generator = new BarcodeGeneratorJPG();
        $barcodeData = $generator->getBarcode($text, $generator::TYPE_CODE_128);

        $jpgPath = 'barcode.jpg';
        Storage::disk('public')->put($jpgPath, $barcodeData);

        $image = imagecreatefromstring(Storage::disk('public')->get($jpgPath));
        imagewebp($image, storage_path('app/public/barcode.webp'));
        imagedestroy($image);

        return view('barcode', ['text' => $text]);
    }
}
