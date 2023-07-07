<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = new Permission();
        return view('backend.parametre.role_permission.permission.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        return to_route('admin.parametres.roleEtPermission.liste')->with('message', 'Permission enregistrée avec succès !');
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
        $permission = Permission::findOrFail($id);

        return view('backend.parametre.role_permission.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $request->name,
        ]);

        return to_route('admin.parametres.roleEtPermission.liste')->with('message', 'Permission modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return to_route('admin.parametres.roleEtPermission.liste')->with('message', 'Permission suprimée avec succès !');
    }
}
