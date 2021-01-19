<?php

namespace App\Http\Controllers\Etatblissement\Etudiant;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Postuler;
use Illuminate\Http\Request;
use App\Assistan\Story;

class PostulerController extends Controller
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
            $postuler = Postuler::where('date', 'LIKE', "%$keyword%")
                ->orWhere('piece_jointe', 'LIKE', "%$keyword%")
                ->orWhere('statut', 'LIKE', "%$keyword%")
                ->orWhere('etudiant', 'LIKE', "%$keyword%")
                ->orWhere('stage', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $postuler = Postuler::latest()->paginate($perPage);
        }
        
        $ariane = ['postuler'];
        return view('admin/etablissement/etudiant.postuler.index', compact('postuler','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['postuler','Ajouter'];
        return view('admin/etablissement/etudiant.postuler.create',compact('ariane'));
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
			'etudiant' => 'required',
			'stage' => 'required',
			'statut' => 'required',
			'piece_jointe' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('piece_jointe')) {
            $requestData['piece_jointe'] = $request->file('piece_jointe')
                ->store('uploads', 'public');
        }

        Postuler::create($requestData);
        return redirect('admin/etudiant/postuler')->with('flash_message', 'Postuler  Ajouté Avec Succes!');
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
        $postuler = Postuler::findOrFail($id);

        $ariane = ['postuler','Details'];
        return view('admin/etablissement/etudiant.postuler.show', compact('postuler','ariane'));
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
        $postuler = Postuler::findOrFail($id);

        $ariane = ['postuler','Modification'];
        return view('admin/etablissement/etudiant.postuler.edit', compact('postuler','ariane'));
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
			'etudiant' => 'required',
			'stage' => 'required',
			'statut' => 'required',
			'piece_jointe' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('piece_jointe')) {
            $requestData['piece_jointe'] = $request->file('piece_jointe')
                ->store('uploads', 'public');
        }

        $postuler = Postuler::findOrFail($id);
        $postuler->update($requestData);

        return redirect('admin/etudiant/postuler')->with('flash_message', 'Postuler Modifier Avec succes!');
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
        Postuler::destroy($id);
        return response()->json(['status'=>'Postuler Supprimer avec Succes']);
    }
}
