<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Assistan\Story;
use App\User;

class EntrepriseController extends Controller
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
            $entreprise = Entreprise::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('adresse', 'LIKE', "%$keyword%")
                ->orWhere('tel_entreprise', 'LIKE', "%$keyword%")
                ->orWhere('responsable', 'LIKE', "%$keyword%")
                ->orWhere('ville', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('pays', 'LIKE', "%$keyword%")
                ->orWhere('administrateur', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $entreprise = Entreprise::latest()->paginate($perPage);
        }

        foreach ($entreprise as $item) {
            # code...
            $item->user = User::findOrFail($item->administrateur);
        }
        
        $ariane = ['entreprise'];
        return view('admin/entreprise.entreprise.index', compact('entreprise','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['entreprise','Ajouter'];
        $user = User::all();
        return view('admin/entreprise.entreprise.create',compact('ariane','user'));
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
			'adresse' => 'required',
			'tel_entreprise' => 'required',
			'responsable' => 'required',
			'ville' => 'required',
			'pays' => 'required',
			'administrateur' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        Entreprise::create($requestData);
        return redirect('admin/entreprise')->with('flash_message', 'Entreprise  Ajouté Avec Succes!');
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
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->user = User::findOrFail($entreprise->administrateur);
        $ariane = ['entreprise','Details'];
        return view('admin/entreprise.entreprise.show', compact('entreprise','ariane'));
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
        $entreprise = Entreprise::findOrFail($id);
        $user = User::all();
        $ariane = ['entreprise','Modification'];
        return view('admin/entreprise.entreprise.edit', compact('entreprise','ariane','user'));
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
			'adresse' => 'required',
			'tel_entreprise' => 'required',
			'responsable' => 'required',
			'ville' => 'required',
			'pays' => 'required',
			'administrateur' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        $entreprise = Entreprise::findOrFail($id);
        $entreprise->update($requestData);

        return redirect('admin/entreprise')->with('flash_message', 'Entreprise Modifier Avec succes!');
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
        Entreprise::destroy($id);
        return response()->json(['status'=>'Entreprise Supprimer avec Succes']);
    }
}
