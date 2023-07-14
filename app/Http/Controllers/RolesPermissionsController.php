<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsController extends Controller
{
    /**
     * Listar roles.
     */
    public function index()
    {
        // $roles = Role::all();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();

        return view('roles.list', compact('roles', 'permissions'));
        // return response()->json($roles);
    }


    /**
     * Crear role.
     */
    public function create(Request $request)
    {
        //Crear role
        $role = $request->input('nameRole');
        $nameRole = Role::create(['name' => $role]);

        // Asignar los permisos al rol
        foreach ($request->permissionList as $key => $permission) {
            $nameRole->givePermissionTo([$permission]);
        }

        return redirect()->route('roles.list');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $nameRole = Role::find($request->input('idRoleEditar'));
        $nameRole->name = $request->input('nameRoleEditar');
        $nameRole->save();

        $currentPermissions = $nameRole->permissions()->pluck('permission_id');
        $nameRole->revokePermissionTo($currentPermissions);
        // return response()->json($role);

        // Asignar los permisos al rol
        foreach ($request->permissionListEditar as $key => $permission) {
            $nameRole->givePermissionTo([$permission]);
        }

        return redirect()->route('roles.list');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
