<?php

namespace App\Http\Controllers\Etatblissement;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Assistan\Story;

class FiliereController extends Controller
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
            $filiere = Filiere::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('etablissement', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $filiere = Filiere::latest()->paginate($perPage);
        }
        
        $ariane = ['filiere'];
        return view('admin/etablissement.filiere.index', compact('filiere','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['filiere','Ajouter'];
        return view('admin/etablissement.filiere.create',compact('ariane'));
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
			'nom' => 'required'
		]);
        $requestData = $request->all();
        
        Filiere::create($requestData);
        return redirect('admin/filiere')->with('flash_message', 'Filiere  Ajouté Avec Succes!');
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
        $filiere = Filiere::findOrFail($id);

        $ariane = ['filiere','Details'];
        return view('admin/etablissement.filiere.show', compact('filiere','ariane'));
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
        $filiere = Filiere::findOrFail($id);

        $ariane = ['filiere','Modification'];
        return view('admin/etablissement.filiere.edit', compact('filiere','ariane'));
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
			'nom' => 'required'
		]);
        $requestData = $request->all();
        
        $filiere = Filiere::findOrFail($id);
        $filiere->update($requestData);

        return redirect('admin/filiere')->with('flash_message', 'Filiere Modifier Avec succes!');
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
        Filiere::destroy($id);
        return response()->json(['status'=>'Filiere Supprimer avec Succes']);
    }
}
