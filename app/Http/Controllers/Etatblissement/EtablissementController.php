<?php

namespace App\Http\Controllers\Etatblissement;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Etablissement;
use App\User;
use Illuminate\Http\Request;

class EtablissementController extends Controller
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
            $etablissement = Etablissement::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('ville', 'LIKE', "%$keyword%")
                ->orWhere('administrateur', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $etablissement = Etablissement::latest()->paginate($perPage);
        }

        foreach ($etablissement as $item) {
            # code...
            $item->user = User::findOrFail($item->administrateur);
        }
        
        $ariane = ['etablissement'];
        return view('admin/etablissement.etablissement.index', compact('etablissement','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = User::all();
        $ariane = ['etablissement','Ajouter'];
        return view('admin/etablissement.etablissement.create',compact('ariane','user'));
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
			'ville' => 'required',
			'administrateur' => 'required'
		]);
        $requestData = $request->all();
        
        Etablissement::create($requestData);
        return redirect('admin/etablissement')->with('flash_message', 'Etablissement  Ajouté Avec Succes!');
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
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->user = User::findOrFail($etablissement->administrateur);
        $ariane = ['etablissement','Details'];
        return view('admin/etablissement.etablissement.show', compact('etablissement','ariane'));
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
        $etablissement = Etablissement::findOrFail($id);
        $user = User::all();
        $ariane = ['etablissement','Modification'];
        return view('admin/etablissement.etablissement.edit', compact('etablissement','ariane','user'));
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
			'ville' => 'required',
			'administrateur' => 'required'
		]);
        $requestData = $request->all();
        
        $etablissement = Etablissement::findOrFail($id);
        $etablissement->update($requestData);

        return redirect('admin/etablissement')->with('flash_message', 'Etablissement Modifier Avec succes!');
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
        Etablissement::destroy($id);

        return response()->json(['status'=>'Etablissement Supprimer avec Succes']);
    }
}
