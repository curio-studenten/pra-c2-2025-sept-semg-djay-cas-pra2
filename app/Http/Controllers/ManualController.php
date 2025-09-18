<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;
use Illuminate\Support\Facades\DB;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id )
    {
       

        

        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        

       

        return view('pages/manual_view', [
            "manual" => $manual,
            "brand" => $brand,
           
        ]);

    }
    public function redirectToManual($manualId)
    {
        
        $manual = Manual::findOrFail($manualId);
        $manual->views = $manual->views + 1;
        $manual->save();

       

        // Stuur door naar de echte manual-link
        return redirect($manual->url);
    }
    
}
