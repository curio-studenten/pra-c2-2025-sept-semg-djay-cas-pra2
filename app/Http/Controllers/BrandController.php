<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug , $manual_id = null)
    {
        // Vind de brand
        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::all()->where('brand_id', $brand_id);
       




        // Haal alle manuals van deze brand, gesorteerd op views
        $top5Manuals = Manual::where('brand_id', $brand_id)
                        ->limit(5)
                         ->orderBy('views', 'desc')
                         ->get();

        // Eventueel kun je hier nog andere oude functionaliteit behouden
        // Bijvoorbeeld: je kunt extra filtering of logica toevoegen zoals voorheen

        return view('pages.manual_list', [
            
            "brand" => $brand,
            "top5Manuals" => $top5Manuals,
            "manuals" => $manuals
        ]);

        
    }


    public function letterIndex($letter){
    
    $letter = strtoupper($letter);

    $brands = Brand::where('name', 'LIKE', $letter . '%')
                   ->orderBy('name')
                   ->get();

    return view('pages.brands_by_letter', [
        'brands' => $brands,
        'letter' => $letter
    ]);

    }   


}
