<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;
use App\Models\Type;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    
    public function index ()
    {
         $brands = Brand::with('manuals')->get();
        return view('pages.admin', compact('brands'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'type_name' => 'required|string|max:255',
            'link_name' => 'required|url|max:2048',
        ],
        [
            'brand_id.required' => 'Het merk veld is verplicht.',
            'brand_id.exists' => 'Het geselecteerde merk bestaat niet.',
            'type_name.required' => 'Het type veld is verplicht.',
            'type_name.string' => 'Het type veld moet een geldige tekst zijn.',
            'type_name.max' => 'Het type veld mag niet langer zijn dan 255 tekens.',
            'link_name.required' => 'Het link veld is verplicht.',
            'link_name.url' => 'Het link veld moet een geldige URL zijn.',
            'link_name.max' => 'Het link veld mag niet langer zijn dan 2048 tekens.',
        ]);




        

        Manual::create([
            'brand_id' => $validated['brand_id'],
            'name' => $validated['type_name'],
            'originUrl' => $validated['link_name'],
            'views' => 0,
            'filesize' => 0, // Placeholder, adjust as needed


            
        ]);

        

        
        return redirect()->route('admin.brands',)->with('success', 'Manual Succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
