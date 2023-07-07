<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function liste()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('backend.parametre.role_permission.index', compact('roles', 'permissions'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = new Role();
        return view('backend.parametre.role_permission.role.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return to_route('admin.parametres.roleEtPermission.liste')->with('message', 'Role enregistré avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('backend.parametre.role_permission.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name,
        ]);

        return to_route('admin.parametres.roleEtPermission.liste')->with('message', 'Role modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return to_route('admin.parametres.roleEtPermission.liste')->with('message', 'Role supprimé avec succès !');
    }
}
