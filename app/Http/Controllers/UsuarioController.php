<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id_usuario', 'desc')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:usuarios,username',
            'password' => 'required|string|min:6',
            'perfil_usuario' => 'required|in:Digitador,Cajero,Gerente',
        ]);

        // Generar salt y hash
        $salt = bin2hex(random_bytes(25));
        $passwordHash = hash('sha256', $validated['password'] . $salt);

        Usuario::create([
            'username' => $validated['username'],
            'password_hash' => $passwordHash,
            'salt' => $salt,
            'perfil_usuario' => $validated['perfil_usuario'],
            'estado' => true,
            'intentos_login' => 0
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:usuarios,username,' . $usuario->id_usuario . ',id_usuario',
            'password' => 'nullable|string|min:6',
            'perfil_usuario' => 'required|in:Digitador,Cajero,Gerente',
        ]);

        $data = [
            'username' => $validated['username'],
            'perfil_usuario' => $validated['perfil_usuario']
        ];

        // Si se proporcionó nueva contraseña
        if (!empty($validated['password'])) {
            $salt = bin2hex(random_bytes(25));
            $data['password_hash'] = hash('sha256', $validated['password'] . $salt);
            $data['salt'] = $salt;
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->update(['estado' => false]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario desactivado exitosamente.');
    }
}