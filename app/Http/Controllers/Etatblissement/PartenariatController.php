<?php

namespace App\Http\Controllers\Etatblissement;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Partenariat;
use Illuminate\Http\Request;
use App\Assistan\Story;

class PartenariatController extends Controller
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
            $partenariat = Partenariat::where('date_debut', 'LIKE', "%$keyword%")
                ->orWhere('duree', 'LIKE', "%$keyword%")
                ->orWhere('date_signature', 'LIKE', "%$keyword%")
                ->orWhere('entreprise', 'LIKE', "%$keyword%")
                ->orWhere('etablissement', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partenariat = Partenariat::latest()->paginate($perPage);
        }
        
        $ariane = ['partenariat'];
        return view('admin/etablissement.partenariat.index', compact('partenariat','ariane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ariane = ['partenariat','Ajouter'];
        return view('admin/etablissement.partenariat.create',compact('ariane'));
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
			'date_signature' => 'required',
			'duree' => 'required',
			'etablissement' => 'required',
			'entreprise' => 'required'
		]);
        $requestData = $request->all();
        
        Partenariat::create($requestData);
        return redirect('admin/partenariat')->with('flash_message', 'Partenariat  Ajouté Avec Succes!');
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
        $partenariat = Partenariat::findOrFail($id);

        $ariane = ['partenariat','Details'];
        return view('admin/etablissement.partenariat.show', compact('partenariat','ariane'));
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
        $partenariat = Partenariat::findOrFail($id);

        $ariane = ['partenariat','Modification'];
        return view('admin/etablissement.partenariat.edit', compact('partenariat','ariane'));
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
			'date_signature' => 'required',
			'duree' => 'required',
			'etablissement' => 'required',
			'entreprise' => 'required'
		]);
        $requestData = $request->all();
        
        $partenariat = Partenariat::findOrFail($id);
        $partenariat->update($requestData);

        return redirect('admin/partenariat')->with('flash_message', 'Partenariat Modifier Avec succes!');
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
        Partenariat::destroy($id);
        return response()->json(['status'=>'Partenariat Supprimer avec Succes']);
    }
}
