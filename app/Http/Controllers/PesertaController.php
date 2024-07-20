<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isEmpty;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pesertas = User::paginate(10);
        return view('user.index', compact('pesertas'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('user.edit', compact('users'));
    }
    public function destroy(string $id)
    {
        $pesertas =  User::find($id);
        $pesertas->delete();
        return redirect(route('admin.peserta'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')],
            'password' => 'required|string|min:8',
            'group' => 'required|string|max:255',
        ]);

        $value = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'group' => $request->group,
        ];

        User::create($value);
        return redirect(route('admin.peserta'));
    }
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)
            ],
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8',
            'group' => 'required|string|max:255',
        ]);
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak cocok.'])->withInput();
        }
        if (!isEmpty($request->password)) {
        }
        $value = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'group' => $request->group,
        ];
        User::where('id', $id)->update($value);
        return redirect(route('admin.peserta'));
    }
}
