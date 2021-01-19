<?php

namespace App\Http\Controllers\Etatblissement\Etudiant;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Assistan\Story;

class EtudiantController extends Controller
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
            $etudiant = Etudiant::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('date_nais', 'LIKE', "%$keyword%")
                ->orWhere('lieu_nais', 'LIKE', "%$keyword%")
                ->orWhere('matricule', 'LIKE', "%$keyword%")
                ->orWhere('utilisateur', 'LIKE', "%$keyword%")
                ->orWhere('niveau', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $etudiant = Etudiant::latest()->paginate($perPage);
        }
        
        $ariane = ['etudiant'];
        return view('admin/etablissement/etudiant.etudiant.index', compact('etudiant','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['etudiant','Ajouter'];
        return view('admin/etablissement/etudiant.etudiant.create',compact('ariane'));
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
			'prenom' => 'required',
			'niveau' => 'required',
			'date_nais' => 'required',
			'lieu_nais' => 'required',
			'matricule' => 'required',
			'utilisateur' => 'required'
		]);
        $requestData = $request->all();
        
        Etudiant::create($requestData);
        return redirect('admin/etudiant/etudiant')->with('flash_message', 'Etudiant  Ajouté Avec Succes!');
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
        $etudiant = Etudiant::findOrFail($id);

        $ariane = ['etudiant','Details'];
        return view('admin/etablissement/etudiant.etudiant.show', compact('etudiant','ariane'));
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
        $etudiant = Etudiant::findOrFail($id);

        $ariane = ['etudiant','Modification'];
        return view('admin/etablissement/etudiant.etudiant.edit', compact('etudiant','ariane'));
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
			'prenom' => 'required',
			'niveau' => 'required',
			'date_nais' => 'required',
			'lieu_nais' => 'required',
			'matricule' => 'required',
			'utilisateur' => 'required'
		]);
        $requestData = $request->all();
        
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($requestData);

        return redirect('admin/etudiant/etudiant')->with('flash_message', 'Etudiant Modifier Avec succes!');
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
        Etudiant::destroy($id);
        return response()->json(['status'=>'Etudiant Supprimer avec Succes']);
    }
}
