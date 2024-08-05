<?php

namespace App\Http\Controllers;

use App\Models\Chambres;
use Illuminate\Http\Request;

class AfficherChambresController extends Controller
{
    public function chambres() {
        $mes_chambres = Chambres::latest()->where('is_approved', true)->with('image')->paginate(20);
        // dd($mes_chambres);
        return view('chambre',compact('mes_chambres'));
    }
}
