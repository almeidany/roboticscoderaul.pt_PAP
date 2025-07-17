<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tshirts;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Mostrar formulário (com tshirt_sizes e classes)
    public function showRegistrationForm()
    {
        $tshirt_sizes = Tshirts::all();
        $classes = Classes::orderBy('class_year', 'asc')
            ->orderBy('class', 'asc')
            ->get()
            ->map(function ($item) {
                $item->full_class = $item->class_year . $item->class;
                return $item;
            });

        return view('auth.register', compact('tshirt_sizes', 'classes'));
    }

    // Validação dos dados
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:35',
            'last_name' => 'required|string|max:35',
            'schoolnumber' => 'required|string|regex:/^\d{5,6}$/|unique:users|max:6',
            'birth_date' => 'required|date',
            'phonenumber' => 'required|numeric|unique:users',
            'class' => 'required|string|max:10',
            'tshirt_size' => 'required|string|max:3',
            'food_allergies' => 'required|in:sim,nao',
            'image_authorization' => 'required|in:sim,nao',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:10920',
            'email' => 'required|string|email|max:75|unique:users|regex:/@aerp\.pt$/',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    // Criação do usuário + login automático
    protected function create(array $data)
    {
        $photoName = null;

        if (isset($data['photo']) && $data['photo']) {
            $file = $data['photo'];
            $extension = $file->getClientOriginalExtension();
            $first = preg_replace('/[^A-Za-z0-9\-]/', '', $data['first_name']);
            $last = preg_replace('/[^A-Za-z0-9\-]/', '', $data['last_name']);
            $name = $first . '_' . $last . '_' . time() . '.' . $extension;
            $file->storeAs('images/users', $name);
            $photoName = $name;
        }

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'schoolnumber' => $data['schoolnumber'],
            'birth_date' => $data['birth_date'],
            'phonenumber' => $data['phonenumber'],
            'class' => $data['class'],
            'tshirt_size' => $data['tshirt_size'],
            'food_allergies' => $data['food_allergies'],
            'image_authorization' => $data['image_authorization'],
            'allergies_description' => $data['allergies_description'] ?? null,
            'photo' => $photoName,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->addRole('aluno');

        Auth::login($user);

        return $user;
    }

    // Método register para receber POST, validar, criar e redirecionar
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();
        $data['photo'] = $request->file('photo');

        $this->create($data);

        return redirect('/dashboard');  // redireciona após login
    }
}
