<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\StoreItem;
use Illuminate\Support\Str;
// use Milon\Barcode\DNS1D;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ItemController extends Controller
{
    public function create(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'item_name' => 'required|string',
            'color' => 'required|string',
            'city_id'=> 'required',
            'city' => 'required|string',
            'place_id' => 'required',
            'place' => 'required|string',
            'category_id' => 'required',
            'category' => 'required|string',
            'sub_category_id' => 'required',
            'sub_category' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string',
            'status' =>'required',
            // 'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('item_images', 'public'); // 'item_images' is a directory under 'public/storage'
            $validatedData['image'] = $imagePath;
        }
                        
        // Create a new item
        Item::create($validatedData);

        return redirect()->back()->with('success', __('dashboard.item-request-created'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'item_name' => 'required|string',
            'color' => 'required|string',
            'city_id' => 'required',
            'city' => 'required|string',
            'place_id' => 'required',
            'place' => 'required|string',
            'category_id' => 'required',
            'category' => 'required|string',
            'sub_category_id' => 'required',
            'sub_category' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string',
            'status' => 'required',
            'weight' => 'required',
            // 'image' => 'required',
        ]);
    
        // Generate a random and unique barcode
        $qr_codeValue = $this->generateUniqueQrcode();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('item_images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Create a new item with the barcode field included
        $item = new StoreItem($validatedData);
        $item->qr_code = 'qrcodes/'.$qr_codeValue . '.svg';
        $item->save();
    
        // Generate QR code and save it
        $qrCodePath = public_path('qrcodes/' . $qr_codeValue . '.svg');
    
        // Ensure the directory exists
        if (!file_exists(public_path('qrcodes'))) {
            mkdir(public_path('qrcodes'), 0777, true);
        }
    
        // Save the QR code image
        file_put_contents($qrCodePath, QrCode::size(500)->generate(url("/item/{$item->id}")));
            
        // Update the item with the QR code image path
        $item->update(['qr_code_image' => $qrCodePath]);
            
        return redirect()->back()->with('success', __('dashboard.item-request-created'));
    }
    
    private function generateUniqueQrcode()
    {
        // Generate a random qr_code and check if it's unique
        do {
            $qr_code = Str::random(10); // Adjust the length of the qr_code as needed
        } while (StoreItem::where('qr_code', $qr_code)->exists());
    
        return $qr_code;
    }
                

    // public function store(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'user_id' => 'required',
    //         'item_name' => 'required|string',
    //         'color' => 'required|string',
    //         'city_id' => 'required',
    //         'city' => 'required|string',
    //         'place_id' => 'required',
    //         'place' => 'required|string',
    //         'category_id' => 'required',
    //         'category' => 'required|string',
    //         'sub_category_id' => 'required',
    //         'sub_category' => 'required|string',
    //         'date' => 'required|date',
    //         'time' => 'required',
    //         'description' => 'nullable|string',
    //         'status' => 'required',
    //         // 'image' => 'required',
    //     ]);
    
    //     // Generate a random and unique barcode
    //     $barcodeValue = $this->generateUniqueBarcode();
    
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imagePath = $image->store('item_images', 'public');
    //         $validatedData['image'] = $imagePath;
    //     }
    
    //     // Create a new item with the barcode field included
    //     $item = new StoreItem($validatedData);
    //     $item->barcode = $barcodeValue;
    //     $item->save();
    
    //     // Generate barcode image and save it
    //     $barcode = new DNS1D();
    //     $barcodeStoragePath = storage_path('app/public/barcodes/');
    //     $barcode->setStorPath($barcodeStoragePath);
    //     $barcodePath = $barcode->getBarcodePNGPath($barcodeValue, 'C39');
    
    //     // Update the item with the barcode image path
    //     $item->update(['barcode_image' => $barcodePath]);
    
    //     return redirect()->back()->with('success', 'Find item request created successfully!');
    // }
    
    // private function generateUniqueBarcode()
    // {
    //     // Generate a random barcode and check if it's unique
    //     do {
    //         $barcode = Str::random(10); // Adjust the length of the barcode as needed
    //     } while (StoreItem::where('barcode', $barcode)->exists());
    
    //     return $barcode;
    // }

}
