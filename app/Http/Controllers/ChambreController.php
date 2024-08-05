<?php

namespace App\Http\Controllers;

use App\Models\Chambres;
use App\Models\CloudFile;
use App\Models\Option;
use App\Http\Requests\ChambresRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChambreController extends Controller
{
    // Affichage de la liste des chambres du propriétaire
    public function index()
        {
            // Récupère tout les chambres du propriétaire connecté .
            $chambres = Chambres::latest()->where('proprietaire_id', auth('proprietaire')->user()->id)->get();;
            // Renvoie 'dashboard..proprietaire.chambre.index'
            return view('dashboard..proprietaire.chambre.index',  compact('chambres'));
        }

        //Création d'une chambre
    public function create()
        {
            // Rétourne 'dashboard..proprietaire.chambre.create'
            return view('dashboard.proprietaire.chambre.create');
        }
    public function handlecreate(Request $request)
        {
            // Validation des données d'entrée
            $request->validate([
                'name' => 'required',
                'adresse' => 'required|min:2|max:20',
                'ville' => 'required|min:3|max:20',
                'price' => 'required|integer',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            ], [
                'name.required' => 'Le nom de la chambre est requis',
                'adresse.required' => 'L\'adresse de la chambre est requise',
                'adresse.min' => 'minimum 2 caractères',
                'adresse.max' => 'maximum 20 caractères',
                'ville.required' => 'La ville de la chambre est requise',
                'ville.min' => 'minimum 3 caractères',
                'ville.max' => 'maximum 20 caractères',
                'price.required' => 'Le prix de la chambre est requis',
                'image.required' => 'L\'image de la chambre est requise',
                'description.required' => 'La description de la chambre est requise',
                'price.integer' => 'Le prix doit être uniquement des chiffres',
            ]);

            try {
                // Vérifiez que le fichier image est présent
                if ($request->hasFile('image')) {
                    // Stockez l'image et récupérez le chemin
                    $imagePath = $request->file('image')->store('images', 'public');
                } else {
                    // Gérer le cas où l'image n'est pas présente
                    return redirect()->back()->with('error', 'Image is required and was not provided.');
                }

                // Créez la chambre dans la base de données
                Chambres::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'adresse' => $request->adresse,
                    'ville' => $request->ville,
                    'description' => $request->description,
                    'image_path' => $imagePath, // Utilisez $imagePath pour insérer le chemin de l'image
                    'proprietaire_id' => auth('proprietaire')->user()->id,
                    'is_approved' => false // La chambre doit être approuvée par l'administrateur
                ]);

                return redirect()->route('chambre.index')->with('success', 'Chambre a bien été enregistrée et est en attente d\'approbation.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

    public function handleImageUpload($data, $request, $filekey, $destination, $attributeName)
        {
            if ($request->hasFile($filekey)) {

                $filePath = $request->file($filekey)->store($destination, 'public');

                $cloudfile = CloudFile::create([
                    'path' => $filePath,
                ]);

                $data->{$attributeName} = $cloudfile->id;

                $data->update();
            }
        }

    public function edit(Chambres $chambre)
        {
            return view('dashboard.proprietaire.chambre.edit', compact('chambre'));
        }

    public function update( Request $request , $id)
        {
            // Validation des nouvelles données
            $request->validate([
                'name' => 'required',
                'adresse' => 'required|min:2|max:20',
                'ville' => 'required|min:3|max:20',
                'price' => 'required|integer',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            ], [
                'name.required' => 'Le nom de la chambre est requis',
                'adresse.required' => 'L\'adresse de la chambre est requise',
                'adresse.min' => 'minimum 2 caractères',
                'adresse.max' => 'maximum 20 caractères',
                'ville.required' => 'La ville de la chambre est requise',
                'ville.min' => 'minimum 3 caractères',
                'ville.max' => 'maximum 20 caractères',
                'price.required' => 'Le prix de la chambre est requis',
                'image.image' => 'L\'image doit être un fichier de type: jpeg, png, jpg, gif, svg',
                'description.required' => 'La description de la chambre est requise',
                'price.integer' => 'Le prix doit être uniquement des chiffres',
            ]);

            try {
                // Récupérer la chambre à modifier
                $chambre = Chambres::findOrFail($id);

                // Si une nouvelle image est téléchargée, stockez-la et mettez à jour le chemin de l'image
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('images', 'public');
                    $chambre->image_path = $imagePath;
                }

                // Mettre à jour les informations de la chambre
                $chambre->update([
                    'image_path' => $imagePath,
                    'name' => $request->name,
                    'price' => $request->price,
                    'adresse' => $request->adresse,
                    'ville' => $request->ville,
                    'description' => $request->description,
                ]);

                return redirect()->route('chambre.index')->with('success', 'Chambre a bien été mise à jour');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

    public function delete( $id)
        {
            //Chambres $chambre
            // try {
            //     $chambre->delete();
            //     return redirect()->route('ProprietaireDashboard')->with('success', 'chambre retiré');
            // } catch (Exception $e) {
            //     return redirect()->back()->with('error', $e->getMessage());
            // }
            try {
                // Récupérer la chambre à supprimer
                $chambre = Chambres::findOrFail($id);

                // Supprimer l'image associée si elle existe
                if ($chambre->image_path) {
                    Storage::disk('public')->delete($chambre->image_path);
                }

                // Supprimer la chambre de la base de données
                $chambre->delete();

                return redirect()->route('chambre.index')->with('success', 'Chambre a bien été supprimée');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

    // public function show($id)
    //     {
    //         try {
    //             $chambre = Chambres::findOrFail($id);
    //             return view('dashboard.proprietaire.chambre.show' , compact('chambre'));
    //             //code...
    //         } catch (\Exception $e) {
    //             //throw $th;
    //         }
    //     }
    public function updateS(Chambres $chambre){
        return view('dashboard.proprietaire.chambre.UpdateS', compact('chambre'));
    }

    public function updateStatus(Request $request, $id)
    {

        // Valider le statut
        $request->validate([
            'statut' => 'required|in:Disponible,Chambre Réservée,Chambre Occupée',
        ]);

        try {
             // Récupérer la chambre à changer la statut
         $chambre = Chambres::findOrFail($id);
        
        // Mettre à jour le statut de la chambre
        $chambre->statut = $request->statut;
        $chambre->save();

        return redirect()->route('chambre.index')->with('success', 'Le statut de la chambre a été mis à jour.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

}

