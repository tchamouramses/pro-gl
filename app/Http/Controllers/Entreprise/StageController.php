<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Assistan\Story;

class StageController extends Controller
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
            $stage = Stage::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('date_fin', 'LIKE', "%$keyword%")
                ->orWhere('date_debut', 'LIKE', "%$keyword%")
                ->orWhere('fichier_join', 'LIKE', "%$keyword%")
                ->orWhere('portee', 'LIKE', "%$keyword%")
                ->orWhere('entreprise', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $stage = Stage::latest()->paginate($perPage);
        }


        
        $ariane = ['stage'];
        return view('admin/entreprise.stage.index', compact('stage','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['stage','Ajouter'];
        return view('admin/entreprise.stage.create',compact('ariane'));
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
			'entreprise' => 'required',
			'portee' => 'required',
			'date_debut' => 'required',
			'date_fin' => 'required',
			'nom' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('fichier_join')) {
            $requestData['fichier_join'] = $request->file('fichier_join')
                ->store('uploads', 'public');
        }

        Stage::create($requestData);
        return redirect('admin/stage')->with('flash_message', 'Stage  Ajouté Avec Succes!');
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
        $stage = Stage::findOrFail($id);

        $ariane = ['stage','Details'];
        return view('admin/entreprise.stage.show', compact('stage','ariane'));
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
        $stage = Stage::findOrFail($id);

        $ariane = ['stage','Modification'];
        return view('admin/entreprise.stage.edit', compact('stage','ariane'));
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
			'entreprise' => 'required',
			'portee' => 'required',
			'date_debut' => 'required',
			'date_fin' => 'required',
			'nom' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('fichier_join')) {
            $requestData['fichier_join'] = $request->file('fichier_join')
                ->store('uploads', 'public');
        }

        $stage = Stage::findOrFail($id);
        $stage->update($requestData);

        return redirect('admin/stage')->with('flash_message', 'Stage Modifier Avec succes!');
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
        Stage::destroy($id);
        return response()->json(['status'=>'Stage Supprimer avec Succes']);
    }
}
