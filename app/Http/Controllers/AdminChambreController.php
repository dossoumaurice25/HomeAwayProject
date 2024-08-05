<?php
namespace App\Http\Controllers;

use App\Models\Chambres;
use Illuminate\Http\Request;

class AdminChambreController extends Controller
{
    public function index()
    {
        $chambres = Chambres::where('is_approved', false)->get();
        return view('admin.chambres.index', compact('chambres'));
    }

    public function approve($id)
    {
        $chambre = Chambres::findOrFail($id);
        $chambre->is_approved = true;
        $chambre->save();

        return redirect()->back()->with('success', 'Chambre approuvée avec succès.');
    }

    public function approved()
    {
        $chambres = Chambres::where('is_approved', true)->get();
        return view('admin.chambres.approved', compact('chambres'));
    }

    public function disapprove($id)
    {
        $chambre = Chambres::findOrFail($id);
        $chambre->is_approved = false;
        $chambre->save();

        return redirect()->back()->with('success', 'Chambre désapprouvée avec succès.');
    }
}
