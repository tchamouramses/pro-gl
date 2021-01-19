<?php

namespace App\Http\Controllers\Etatblissement;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PeriodeAcademique;
use Illuminate\Http\Request;
use App\Assistan\Story;

class PeriodeAcademiqueController extends Controller
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
            $periodeacademique = PeriodeAcademique::where('date_debut', 'LIKE', "%$keyword%")
                ->orWhere('date_fin', 'LIKE', "%$keyword%")
                ->orWhere('est_archive', 'LIKE', "%$keyword%")
                ->orWhere('etablissement', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $periodeacademique = PeriodeAcademique::latest()->paginate($perPage);
        }
        
        $ariane = ['periode-academique'];
        return view('admin/etablissement.periode-academique.index', compact('periodeacademique','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['periode-academique','Ajouter'];
        return view('admin/etablissement.periode-academique.create',compact('ariane'));
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
			'date_debut' => 'required',
			'date_fin' => 'required',
			'etablissement' => 'required'
		]);
        $requestData = $request->all();
        
        PeriodeAcademique::create($requestData);
        return redirect('admin/periode-academique')->with('flash_message', 'PeriodeAcademique  Ajouté Avec Succes!');
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
        $periodeacademique = PeriodeAcademique::findOrFail($id);

        $ariane = ['periode-academique','Details'];
        return view('admin/etablissement.periode-academique.show', compact('periodeacademique','ariane'));
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
        $periodeacademique = PeriodeAcademique::findOrFail($id);

        $ariane = ['periode-academique','Modification'];
        return view('admin/etablissement.periode-academique.edit', compact('periodeacademique','ariane'));
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
			'date_debut' => 'required',
			'date_fin' => 'required',
			'etablissement' => 'required'
		]);
        $requestData = $request->all();
        
        $periodeacademique = PeriodeAcademique::findOrFail($id);
        $periodeacademique->update($requestData);

        return redirect('admin/periode-academique')->with('flash_message', 'PeriodeAcademique Modifier Avec succes!');
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
        PeriodeAcademique::destroy($id);
        return response()->json(['status'=>'PeriodeAcademique Supprimer avec Succes']);
    }
}
