<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // public function __Construct() {
    //     $this->middleware (['role:1']);
    // }

    public function kelola_pengguna()
    {
        // // $user = User::get();
        // $user = User::join('role','id_role','=','users','role')->get();
        // return view('admin.pengguna.kelola_pengguna', ['user' => $user]);
        // // // $data ['users'] = User::join('role','id_role','=','users','role')->get();
        // // $user = User::get();
        // // return view('admin.pengguna.kelola_pengguna');
        $users = User::join('role as r', 'users.role', '=', 'r.id_role')
            ->select('users.*', 'r.role as role')
            ->get();

        return view('admin.pengguna.kelola_pengguna', ['user' => $users]);

        return abort(403);
    }

    public function create()
    {
        $data['role'] = Role::all();
        return view('admin.pengguna.create', $data);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pendidikan_terakhir' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'status_pekerjaan' => 'required|string',
            'bidang_studi' => 'required|string|max:255',
            'role' => 'required|exists:role,id_role',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'telepon' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        User::create([
            'nip' => $validatedData['nip'],
            'name' => $validatedData['name'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'pendidikan_terakhir' => $validatedData['pendidikan_terakhir'],
            'jabatan' => $validatedData['jabatan'],
            'status_pekerjaan' => $validatedData['status_pekerjaan'],
            'bidang_studi' => $validatedData['bidang_studi'],
            'role' => $validatedData['role'],
            'alamat' => $validatedData['alamat'],
            'email' => $validatedData['email'],
            'telepon' => $validatedData['telepon'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect or return response
        return redirect()->route('kelola_pengguna')->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data['role'] = Role::all();
        return view('admin.pengguna.edit', ['user' => $user] + $data);
    }

    // public function update(Request $request, $id) {
    //     $validatedData = $request->validate([
    //         'nip' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'jenis_kelamin' => 'required|string',
    //         'tempat_lahir' => 'required|string|max:255',
    //         'tanggal_lahir' => 'required|date',
    //         'pendidikan_terakhir' => 'required|string|max:255',
    //         'jabatan' => 'required|string|max:255',
    //         'status_pekerjaan' => 'required|string',
    //         'bidang_studi' => 'required|string|max:255',
    //         'role' => 'required|exists:role,id_role', // Mengubah 'roles' menjadi 'role'
    //         'alamat' => 'required|string',
    //         'email' => 'required|email|unique:users,email,' . $id,
    //         'telepon' => 'required|string|max:15',
    //         // 'password' => 'nullable|string|min:8',
    //     ]);

    //     $user = User::findOrFail($id);
    //     $user->update([
    //         'nip' => $validatedData['nip'],
    //         'name' => $validatedData['name'],
    //         'jenis_kelamin' => $validatedData['jenis_kelamin'],
    //         'tempat_lahir' => $validatedData['tempat_lahir'],
    //         'tanggal_lahir' => $validatedData['tanggal_lahir'],
    //         'pendidikan_terakhir' => $validatedData['pendidikan_terakhir'],
    //         'jabatan' => $validatedData['jabatan'],
    //         'status_pekerjaan' => $validatedData['status_pekerjaan'],
    //         'bidang_studi' => $validatedData['bidang_studi'],
    //         'role' => $validatedData['role'],
    //         'alamat' => $validatedData['alamat'],
    //         'email' => $validatedData['email'],
    //         'telepon' => $validatedData['telepon'],
    //         // 'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
    //     ]);

    //     return redirect()->route('kelola_pengguna')->with('success', 'User updated successfully.');
    // }


    public function update(Request $request, $id)
    {
        // Validasi data, password bisa nullable karena tidak wajib diisi saat edit
        $validatedData = $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pendidikan_terakhir' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'status_pekerjaan' => 'required|string',
            'bidang_studi' => 'required|string|max:255',
            'role' => 'required|exists:role,id_role',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'telepon' => 'required|string|max:15',
            'password' => 'nullable|string|min:8', // Password optional
        ]);

        // Temukan user berdasarkan id
        $user = User::findOrFail($id);

        // Jika password diisi, encrypt password baru
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            // Jika password tidak diisi, gunakan password lama
            unset($validatedData['password']);
        }

        // Update data user dengan yang tervalidasi
        $user->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('kelola_pengguna')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('kelola_pengguna')->with('success', 'Kategori Kegiatan deleted successfully.');
    }



    // public function edit($id) {
    //     $user = User::findOrFail($id);
    //     $data['role'] = Role::all();
    //     return view('admin.pengguna.edit', ['user' => $user] + $data);
    // }

    // public function update(Request $request, $id) {
    //     $validatedData = $request->validate([
    //         'nip' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'jenis_kelamin' => 'required|string',
    //         'tempat_lahir' => 'required|string|max:255',
    //         'tanggal_lahir' => 'required|date',
    //         'pendidikan_terakhir' => 'required|string|max:255',
    //         'jabatan' => 'required|string|max:255',
    //         'status_pekerjaan' => 'required|string',
    //         'bidang_studi' => 'required|string|max:255',
    //         'role' => 'required|exists:roles,id_role',
    //         'alamat' => 'required|string',
    //         'email' => 'required|email|unique:users,email,' . $id,
    //         'telepon' => 'required|string|max:15',
    //         'password' => 'nullable|string|min:8',
    //     ]);

    //     $user = User::findOrFail($id);
    //     $user->update([
    //         'nip' => $validatedData['nip'],
    //         'name' => $validatedData['name'],
    //         'jenis_kelamin' => $validatedData['jenis_kelamin'],
    //         'tempat_lahir' => $validatedData['tempat_lahir'],
    //         'tanggal_lahir' => $validatedData['tanggal_lahir'],
    //         'pendidikan_terakhir' => $validatedData['pendidikan_terakhir'],
    //         'jabatan' => $validatedData['jabatan'],
    //         'status_pekerjaan' => $validatedData['status_pekerjaan'],
    //         'bidang_studi' => $validatedData['bidang_studi'],
    //         'role' => $validatedData['role'],
    //         'alamat' => $validatedData['alamat'],
    //         'email' => $validatedData['email'],
    //         'telepon' => $validatedData['telepon'],
    //         'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
    //     ]);

    //     return redirect()->route('kelola_pengguna')->with('success', 'User updated successfully.');
    // }

    // public function destroy($id) {
    //     $user = User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('kelola_pengguna')->with('success', 'User deleted successfully.');
    // }
}
