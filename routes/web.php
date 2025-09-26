<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
2017-10-30 setup for urls
Home:			/
Brand:			/52/AEG/
Type:			/52/AEG/53/Superdeluxe/
Manual:			/52/AEG/53/Superdeluxe/8023/manual/
				/52/AEG/456/Testhandle/8023/manual/

If we want to add product categories later:
Productcat:		/category/12/Computers/
*/

use App\Models\Brand;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\AdminController;   
use Illuminate\Http\Request;

Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');

Route::get('/manual/redirect/{manual}', [ManualController::class, 'redirectToManual'])->name('manual.redirect');
// Homepage
Route::get('/', function () {
    $teamname = "Team Djay-Cas-Sem";
    $brands = Brand::all()->sortBy('name');
    $topManuals = \App\Models\Manual::with('brand')->orderBy('views', 'desc')->take(10)->get();
    $description = __(key: 'misc.homepag_description');
    return view('pages.homepage', compact('brands', 'teamname', 'topManuals', 'description'));
})->name('home');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.brands');
Route::get('/letter/{letter}', [BrandController::class, 'letterIndex'])
    ->where('letter', '[A-Z]');
Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale routes
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale'])->name('lang-switch');

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);

// Generate sitemaps
Route::get('/generateSitemap/', [SitemapController::class, 'generate']);

Route::view('/contact', 'pages.contact')->name('contact');





Route::get('/set-locale/{locale}', function (Request $request, $locale) {
    if (! in_array($locale, ['en', 'nl'])) {
        $locale = 'en'; // fallback
    }

    $request->session()->put('locale', $locale);

    return redirect()->back();
})->name('setLocale');