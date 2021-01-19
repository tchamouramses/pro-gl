<?php

namespace App\Http\Controllers\Etatblissement;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StatistiqueEtablissement;
use Illuminate\Http\Request;
use App\Assistan\Story;

class StatistiqueEtablissementController extends Controller
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
            $statistiqueetablissement = StatistiqueEtablissement::where('nb_postuler', 'LIKE', "%$keyword%")
                ->orWhere('taux_reussite_examen', 'LIKE', "%$keyword%")
                ->orWhere('nb_diplome_annuelle', 'LIKE', "%$keyword%")
                ->orWhere('nb_etudiant_affilier', 'LIKE', "%$keyword%")
                ->orWhere('nb_entreprise_part', 'LIKE', "%$keyword%")
                ->orWhere('nb_stage_recus', 'LIKE', "%$keyword%")
                ->orWhere('f_m_j_programme', 'LIKE', "%$keyword%")
                ->orWhere('etablissement', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $statistiqueetablissement = StatistiqueEtablissement::latest()->paginate($perPage);
        }
        
        $ariane = ['statistique-etablissement'];
        return view('admin/etablissement.statistique-etablissement.index', compact('statistiqueetablissement','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['statistique-etablissement','Ajouter'];
        return view('admin/etablissement.statistique-etablissement.create',compact('ariane'));
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
			'nb_postuler' => 'required',
			'nb_stage_recus' => 'required',
			'nb_entreprise_part' => 'required',
			'nb_etudiant_affilier' => 'required',
			'nb_diplome_annuelle' => 'required',
			'taux_reussite_examen' => 'required',
			'f_m_j_programme' => 'required'
		]);
        $requestData = $request->all();
        
        StatistiqueEtablissement::create($requestData);
        return redirect('admin/statistique-etablissement')->with('flash_message', 'StatistiqueEtablissement  Ajouté Avec Succes!');
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
        $statistiqueetablissement = StatistiqueEtablissement::findOrFail($id);

        $ariane = ['statistique-etablissement','Details'];
        return view('admin/etablissement.statistique-etablissement.show', compact('statistiqueetablissement','ariane'));
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
        $statistiqueetablissement = StatistiqueEtablissement::findOrFail($id);

        $ariane = ['statistique-etablissement','Modification'];
        return view('admin/etablissement.statistique-etablissement.edit', compact('statistiqueetablissement','ariane'));
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
			'nb_postuler' => 'required',
			'nb_stage_recus' => 'required',
			'nb_entreprise_part' => 'required',
			'nb_etudiant_affilier' => 'required',
			'nb_diplome_annuelle' => 'required',
			'taux_reussite_examen' => 'required',
			'f_m_j_programme' => 'required'
		]);
        $requestData = $request->all();
        
        $statistiqueetablissement = StatistiqueEtablissement::findOrFail($id);
        $statistiqueetablissement->update($requestData);

        return redirect('admin/statistique-etablissement')->with('flash_message', 'StatistiqueEtablissement Modifier Avec succes!');
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
        StatistiqueEtablissement::destroy($id);
        return response()->json(['status'=>'StatistiqueEtablissement Supprimer avec Succes']);
    }
}
