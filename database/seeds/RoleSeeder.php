<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "root";
        $role->display_name = "Administrateur De L'application";
        $role->description = "a tous les pouvoirs sur l'application";
        $role->save();

        $permission = Permission::whereName('etablissement')->first();
        $permission1 = Permission::whereName('filiere')->first();
        $permission2 = Permission::whereName('user')->first();

        $role->attachPermission($permission);
        $role->attachPermission($permission1);
        $role->attachPermission($permission2);



        $role1 = new Role();
        $role1->name = "etablissement";
        $role1->display_name = "Administrateur De L'etablissement";
        $role1->description = "a tous les pouvoirs sur l'application";
        $role1->save();

        $permission = Permission::whereName('filiere')->first();
        $permission1 = Permission::whereName('partenariat')->first();
        $permission3 = Permission::whereName('periode-academique')->first();
        $permission2 = Permission::whereName('statistique-etablissement')->first();
        $permission4 = Permission::whereName('organisme')->first();

        $role1->attachPermission($permission);
        $role1->attachPermission($permission1);
        $role1->attachPermission($permission2);
        $role1->attachPermission($permission3);
        $role1->attachPermission($permission4);




        $role2 = new Role();
        $role2->name = "entreprise";
        $role2->display_name = "Administrateur De L'entreprise";
        $role2->description = "a tous les pouvoirs sur l'application";
        $role2->save();

        $permission = Permission::whereName('entreprise')->first();
        $permission1 = Permission::whereName('stage')->first();

        $role2->attachPermission($permission);
        $role2->attachPermission($permission1);



        $role3 = new Role();
        $role3->name = "etudiant";
        $role3->display_name = "Administrateur De L'etudiant";
        $role3->description = "a tous les pouvoirs sur l'application";
        $role3->save();

        $permission = Permission::whereName('etudiant')->first();
        $permission1 = Permission::whereName('group')->first();
        $permission2 = Permission::whereName('categorie-donnee')->first();
        $permission3 = Permission::whereName('donnee')->first();
        $permissio4 = Permission::whereName('postuler')->first();

        $role3->attachPermission($permission);
        $role3->attachPermission($permission1);
        $role3->attachPermission($permission2);
        $role3->attachPermission($permission3);
        $role3->attachPermission($permission4);


        $role1 = new Role();
        $role1->name = "administrateur";
        $role1->display_name = "Administrateur De L'application";
        $role1->description = "a tous les pouvoirs sur l'application";
        $role1->save();

        $permission = Permission::all();
        foreach ($permission as $item) {
            # code...
            $role1->attachPermission($item);
        }
    }
}
