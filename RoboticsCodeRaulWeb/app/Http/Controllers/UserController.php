<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\tshirts;
use App\Models\Classes;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // Aqui você pode buscar o usuário pelo ID e passá-lo para a view
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    public function edit($id)
    {
        // Aqui você pode buscar o usuário pelo ID e passá-lo para a view de edição
        $user = User::findOrFail($id);
        $tshirt_sizes = Tshirts::all();
        $classes = Classes::all();
        return view('users.edit', compact('user', 'tshirt_sizes', 'classes'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'first_name' => 'required|string|max:35',
            'last_name' => 'required|string|max:35',
            'schoolnumber' => [
                'required',
                'integer',
                Rule::unique('users')->ignore($id),
            ],
            'birth_date' => 'required|date',
            'phonenumber' => [
                'required',
                'integer',
                Rule::unique('users')->ignore($id),
            ],
            'class' => 'required|string|max:10',
            'tshirt_size' => 'required|string|max:3',
            'food_allergies' => 'required|in:sim,nao',
            'image_authorization' => 'required|in:sim,nao',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10920',
            'allergies_description' => 'nullable|string|max:400',
            'email' => [
                'required',
                'string',
                'email',
                'max:75',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();

        // Foto
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $first = preg_replace('/[^A-Za-z0-9\-]/', '', $data['first_name']);
            $last = preg_replace('/[^A-Za-z0-9\-]/', '', $data['last_name']);
            $name = $first . '_' . $last . '_' . time() . '.' . $extension;
            $file->storeAs('images/users', $name);
            $data['photo'] = $name;
        } else {
            $data['photo'] = $user->photo ?? null;
        }

        // Atualiza tudo de uma vez
        $user->update($data);

        return redirect()->route('users')->with('message', 'Utilizador atualizado com sucesso!');
    }

    public function updateRaffles(Request $request, $id, User $user)
    {
        $user = User::findOrFail($id);

        $authUser = Auth::user();

        if ($authUser && $authUser->hasRole('aluno') && $authUser->id !== $user->id) {
            abort(403);
        }


        // Validação dos inputs
        $validated = $request->validate([
            'raffles_given' => 'nullable|integer|min:0',
            'raffles_sold'  => 'nullable|integer|min:0',
        ]);

        // Aplica valores apenas se existirem no request
        if ($request->has('raffles_given')) {
            $user->raffles_given = $request->input('raffles_given');
        }

        if ($request->has('raffles_sold')) {
            $user->raffles_sold = $request->input('raffles_sold');
        }

        $user->save();

        return back()->with('message', 'Dados atualizados com sucesso.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('message', 'Utilizador excluído com sucesso!');
    }
}
