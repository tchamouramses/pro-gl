<?php

namespace App\Http\Controllers\Etatblissement\Etudiant;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Postuler;
use Illuminate\Http\Request;
use App\Assistan\Story;
use App\Models\Stage;
use App\Models\Etudiant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $user =Etudiant::whereUtilisateur(Auth::user()->id)->first();   
        if(isset($user)){
            $postuler = Postuler::where('etudiant','=',$user->id)->latest()->paginate($perPage);
        }else{
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


        $etudiant  = Etudiant::whereUtilisateur(Auth::user()->id)->first();
        if(isset($etudiant)){
            $stage = Postuler::select('stages.*')
                ->join('stages','stages.id','=','postulers.stage')
                ->join('etudiants','etudiants.id','=','postulers.etudiant')
                ->where('etudiants.id', '!=', $etudiant->id)
                ->get();
        }
        

        return view('admin/etablissement/etudiant.postuler.create',compact('ariane','stage'));
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
			'piece_jointe' => 'required'
		]);

        $postuler = new Postuler();

        if ($request->hasFile('piece_jointe')) {
            $postuler->piece_jointe = $request->file('piece_jointe')
                ->store('uploads', 'public');
        }

        $postuler->date = Carbon::now();
        $postuler->etudiant = Etudiant::whereUtilisateur(Auth::user()->id)->first()->id;
        $postuler->stage = $request->stage;
        $postuler->statut = 'ATTENTE';

        $postuler->save();
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
