<?php

namespace App\Http\Controllers\Pages;

use App\Models\Role;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with('role')->get();
        return view('pages.accounts.index', compact('accounts'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('pages.accounts.create', compact('roles'));
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email|',
            'password' => 'required',
        ]);


        $validation['password'] = Hash::make($request->password);
        // dd($validation);

        $create_account = Account::create($validation);

        return redirect()->route('account.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $roles = Role::all();

        $account = Account::findOrFail($id);

        return view('pages.accounts.edit', compact('roles', 'account'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email|',
            'password' => 'required',
        ]);


        $validation['password'] = Hash::make($request->password);

        $account = Account::findOrFail($id);
        $account->update([
            'name' => $validation['name'],
            'user_name' => $validation['user_name'],
            'role_id' => $validation['role_id'],
            'email' => $validation['email'],
            'password' => $validation['email'],
        ]);
        return redirect()->route('account.index')->with('success', 'Data berhasil Diupdate!');
    }

    public function delete($id)
    {
        $account = Account::findOrFail($id);

        $account->delete();

        return redirect()->route('account.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
