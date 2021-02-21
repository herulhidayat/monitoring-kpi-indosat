<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::select('*')->get();
        return view('pages.user', [
                'data_user'         => $data,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'username.unique'   => 'Username Sudah Ada Sebelumnya!',
            'password.confirmed'=> 'Password yang Dimasukkan Tidak Sama!',
            'name.required'     => 'Nama Tidak Boleh Kosong!',
            'username.required' => 'Username Tidak Boleh Kosong!',
            'role.required'     => 'Level Harus Dipilih!',
            'password.required' => 'Password Tidak Boleh Kosong!',
            'micro_cluster_user.required_if' => 'Micro Cluster Tidak Boleh Kosong',
            ];

        $validator = \Validator::make($request->all(), [
            'password' => ['required', 'string', 'confirmed'],
            'micro_cluster_user'    => ['required_if:role,SPV,CSO'],
            'role'     => ['required'],
            'name'     => ['required'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else {
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
            $user->micro_cluster_user = $request->micro_cluster_user;
            $user->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'username.unique'   => 'Username Sudah Ada Sebelumnya!',
            'name.required'     => 'Nama Tidak Boleh Kosong!',
            'username.required' => 'Username Tidak Boleh Kosong!',
            'micro_cluster_user.required_if' => 'Micro Cluster Tidak Boleh Kosong',
            ];

        $validator = \Validator::make($request->all(), [
            'micro_cluster_user'    => ['required_if:role,SPV,CSO'],
            'name'     => ['required'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($request->id)],
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }else {
            $user = User::where('id', $id);
            if($request->name == $request->old_name && $request->username == $request->old_username && $request->role == $request->old_role && $request->micro_cluster_user == $request->old_micro_cluster_user && $request->password == ''){
                return response()->json(['nothing' => 'Data Tidak Ada yang Berubah!']);
            }else{
                if($request->password == ''){
                    $user->update([
                        'name'              => $request->name,
                        'username'          => $request->username,
                        'role'              => $request->role,
                        'micro_cluster_user'=> $request->micro_cluster_user,
                        'password'          => $request->old_password
                    ]);
                }else{
                    $user->update([
                        'name'              => $request->name,
                        'username'          => $request->username,
                        'role'              => $request->role,
                        'micro_cluster_user'=> $request->micro_cluster_user,
                        'password'          => Hash::make($request->password)
                    ]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
    }
}
