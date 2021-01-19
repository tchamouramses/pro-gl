<?php

namespace App\Http\Controllers\Etatblissement\Etudiant;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Donnee;
use Illuminate\Http\Request;
use App\Assistan\Story;

class DonneeController extends Controller
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
            $donnee = Donnee::where('date', 'LIKE', "%$keyword%")
                ->orWhere('valeur', 'LIKE', "%$keyword%")
                ->orWhere('performance', 'LIKE', "%$keyword%")
                ->orWhere('type_perf', 'LIKE', "%$keyword%")
                ->orWhere('type_val', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('etudiant', 'LIKE', "%$keyword%")
                ->orWhere('categorie', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $donnee = Donnee::latest()->paginate($perPage);
        }
        
        $ariane = ['donnee'];
        return view('admin/etablissement/etudiant.donnee.index', compact('donnee','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['donnee','Ajouter'];
        return view('admin/etablissement/etudiant.donnee.create',compact('ariane'));
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
			'date' => 'required',
			'valeur' => 'required',
			'type_val' => 'required',
			'type_perf' => 'required',
			'performance' => 'required',
			'description' => 'required',
			'etudiant' => 'required',
			'categorie' => 'required'
		]);
        $requestData = $request->all();
        
        Donnee::create($requestData);
        return redirect('admin/etudiant/donnee')->with('flash_message', 'Donnee  Ajouté Avec Succes!');
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
        $donnee = Donnee::findOrFail($id);

        $ariane = ['donnee','Details'];
        return view('admin/etablissement/etudiant.donnee.show', compact('donnee','ariane'));
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
        $donnee = Donnee::findOrFail($id);

        $ariane = ['donnee','Modification'];
        return view('admin/etablissement/etudiant.donnee.edit', compact('donnee','ariane'));
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
			'date' => 'required',
			'valeur' => 'required',
			'type_val' => 'required',
			'type_perf' => 'required',
			'performance' => 'required',
			'description' => 'required',
			'etudiant' => 'required',
			'categorie' => 'required'
		]);
        $requestData = $request->all();
        
        $donnee = Donnee::findOrFail($id);
        $donnee->update($requestData);

        return redirect('admin/etudiant/donnee')->with('flash_message', 'Donnee Modifier Avec succes!');
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
        Donnee::destroy($id);
        return response()->json(['status'=>'Donnee Supprimer avec Succes']);
    }
}
