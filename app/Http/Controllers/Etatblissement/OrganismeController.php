<?php

namespace App\Http\Controllers\Etatblissement;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Organisme;
use Illuminate\Http\Request;
use App\Assistan\Story;

class OrganismeController extends Controller
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
            $organisme = Organisme::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('ville', 'LIKE', "%$keyword%")
                ->orWhere('adresse', 'LIKE', "%$keyword%")
                ->orWhere('responsable', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('pays', 'LIKE', "%$keyword%")
                ->orWhere('tel_entreprise', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $organisme = Organisme::latest()->paginate($perPage);
        }
        
        $ariane = ['organisme'];
        return view('admin/etablissement.organisme.index', compact('organisme','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['organisme','Ajouter'];
        return view('admin/etablissement.organisme.create',compact('ariane'));
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
			'tel_entreprise' => 'required',
			'pays' => 'required',
			'logo' => 'required',
			'responsable' => 'required',
			'adresse' => 'required',
			'ville' => 'required',
			'nom' => 'required'
		]);
        $requestData = $request->all();
        
        Organisme::create($requestData);
        return redirect('admin/organisme')->with('flash_message', 'Organisme  Ajouté Avec Succes!');
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
        $organisme = Organisme::findOrFail($id);

        $ariane = ['organisme','Details'];
        return view('admin/etablissement.organisme.show', compact('organisme','ariane'));
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
        $organisme = Organisme::findOrFail($id);

        $ariane = ['organisme','Modification'];
        return view('admin/etablissement.organisme.edit', compact('organisme','ariane'));
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
			'tel_entreprise' => 'required',
			'pays' => 'required',
			'logo' => 'required',
			'responsable' => 'required',
			'adresse' => 'required',
			'ville' => 'required',
			'nom' => 'required'
		]);
        $requestData = $request->all();
        
        $organisme = Organisme::findOrFail($id);
        $organisme->update($requestData);

        return redirect('admin/organisme')->with('flash_message', 'Organisme Modifier Avec succes!');
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
        Organisme::destroy($id);
        return response()->json(['status'=>'Organisme Supprimer avec Succes']);
    }
}
