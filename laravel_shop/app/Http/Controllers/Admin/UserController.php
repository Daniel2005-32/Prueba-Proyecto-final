<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'sometimes|boolean',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin') ? true : false,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $user)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        // Verificar si se puede editar este usuario
        if (!$user->canBeModifiedBy(auth()->user())) {
            return redirect()->route('admin.users.index')
                ->with('error', 'No tienes permiso para editar este usuario');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        // Verificar si se puede modificar este usuario
        if (!$user->canBeModifiedBy(auth()->user())) {
            return redirect()->route('admin.users.index')
                ->with('error', 'No tienes permiso para modificar este usuario');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Solo super admin puede cambiar roles
        if (auth()->user()->isSuperAdmin()) {
            $data['is_admin'] = $request->has('is_admin') ? true : false;
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        // Verificar si se puede eliminar este usuario
        if (!$user->canBeDeletedBy(auth()->user())) {
            return redirect()->route('admin.users.index')
                ->with('error', 'No tienes permiso para eliminar este usuario');
        }

        // No permitir eliminarse a sí mismo
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'No puedes eliminarte a ti mismo');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado correctamente');
    }

    public function toggleAdmin(User $user)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Acceso no autorizado');
        }

        // Solo super admin puede cambiar roles
        if (!auth()->user()->isSuperAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Solo el Super Admin puede cambiar roles de administrador');
        }

        // No permitir cambiar el rol del super admin
        if ($user->isSuperAdmin()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'No puedes modificar al Super Admin');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        $status = $user->is_admin ? 'convertido en administrador' : 'quitado como administrador';
        
        return redirect()->route('admin.users.index')
            ->with('success', "Usuario {$status} correctamente");
    }
}