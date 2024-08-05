<?php

namespace App\Http\Controllers;

use App\Models\Chambres;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index() {
        $chambres = Chambres::latest()->with('image')->where('is_approved', true)->paginate(8);
        return view('welcome',compact('chambres'));

    }

    public function show($id)
    {
        $chambre = Chambres::findOrFail($id);
        return view('pages.chambres.show' , compact('chambre'));
    }

    public function logement(){
        return view('pages.mettez_logement');
    }

    public function chambre_a_louer(){
        $mes_chambres = Chambres::latest()->with('image')->paginate(20);
        return view('chambres_a_louer',compact('mes_chambres'));
    }

    public function page_con(){
        return view('pages.pagecon');
    }

    public function search(Request $request)
    {
        $ville = $request->input('ville');
        $maxPrice = $request->input('price');

        $chambres = Chambres::where('ville', 'like', '%' . $ville . '%')
                      ->where('price', '<=', $maxPrice)
                      ->get();

        return view('pages.chambre_rech', ['chambres' => $chambres]);
    }
}
