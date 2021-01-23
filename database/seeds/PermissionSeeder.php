<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $pemission_name = [
        	[
        	//fournisseur add, update, read
        	    "filiere",
        	    "gestion des filiere"
        	],
            [
                "entreprise",
                "suppression d'iun entreprise"
            ],
        	[
        	//rayon add, update, read
        	    "partenariat",
        	    "gestion des partenariat"
        	],
        	[
        		//categorie add, update, read
        	    "periode-academique",
        	    "gestion des periode-academique"
        	],
        	[
        		//client add, update, read
        	    "etudiant",
        	    "gestion des etudiant"
        	],
        	[
        		//produit add, update, read
        	    "group",
        	    "gestion des group"
        	],
        	[
        		//produit delete
        	    "categorie-donnee",
        	    "supprimer un categorie-donnee"
        	],
        	[
        		//categorie delete
        	    "donnee",
        	    "supprimer une donnee"
        	],
        	[
        		//rayon delete
        	    "stage",
        	    "supprimer un stage"
        	],
        	[
        		//user add, update, read
        	    "postuler",
        	    "gestion des postuler"
        	],
        	[
        		//user add, update, read
        	    "statistique-etablissement",
        	    "suppression des statistique-etablissement"
        	],
            [
                //gestion des reductions
                "organisme",
                "gestion des organisme"
            ],
            [
                //gestion des reductions
                "etablissement",
                "gestion des etablissement"
            ],
            [
                //gestion des reductions
                "user",
                "gestion des utilisateurs"
            ]
        ];

        foreach ($pemission_name as $item) {
        	# code...
        	$permission = new Permission();
        	$permission->name = $item[0];
        	$permission->display_name = $item[1];
        	$permission->description = null;
        	$permission->save();
        }
    }

}