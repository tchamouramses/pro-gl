<?php

namespace App\Http\Controllers\Etatblissement\Etudiant;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CategorieDonnee;
use Illuminate\Http\Request;
use App\Assistan\Story;

class CategorieDonneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $categoriedonnee = CategorieDonnee::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('group', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categoriedonnee = CategorieDonnee::latest()->paginate($perPage);
        }
        
        $ariane = ['categorie-donnee'];
        return view('admin/etablissement/etudiant.categorie-donnee.index', compact('categoriedonnee','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['categorie-donnee','Ajouter'];
        return view('admin/etablissement/etudiant.categorie-donnee.create',compact('ariane'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'nom' => 'required',
			'group' => 'required'
		]);
        $requestData = $request->all();
        
        CategorieDonnee::create($requestData);
        return redirect('admin/etudiant/categorie-donnee')->with('flash_message', 'CategorieDonnee  Ajouté Avec Succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $categoriedonnee = CategorieDonnee::findOrFail($id);

        $ariane = ['categorie-donnee','Details'];
        return view('admin/etablissement/etudiant.categorie-donnee.show', compact('categoriedonnee','ariane'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $categoriedonnee = CategorieDonnee::findOrFail($id);

        $ariane = ['categorie-donnee','Modification'];
        return view('admin/etablissement/etudiant.categorie-donnee.edit', compact('categoriedonnee','ariane'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'nom' => 'required',
			'group' => 'required'
		]);
        $requestData = $request->all();
        
        $categoriedonnee = CategorieDonnee::findOrFail($id);
        $categoriedonnee->update($requestData);

        return redirect('admin/etudiant/categorie-donnee')->with('flash_message', 'CategorieDonnee Modifier Avec succes!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        CategorieDonnee::destroy($id);
        return response()->json(['status'=>'CategorieDonnee Supprimer avec Succes']);
    }
}
