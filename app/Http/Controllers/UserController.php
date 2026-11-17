<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
       public function alluser() {
       $usersWDB = $this->loadUsersWDB();
       //$usersFromDB = $this->usersFromDB();

       $usersFromDB = User::select('id', 'name', 'email', 'address', 'nif')
       ->get();

       //dd($usersFromDB);
       return view('users.allusers', compact('usersWDB', 'usersFromDB'));
    } // fim da funcao alluser



    public function adduser() {
    return view('users.adduser');
    } // fim da funcao adduser



    private function loadUsersWDB(){
    $usersWithoutDB = [
        ['id'=>1, 'name' => 'Sara', 'email' => 'sara@gmail.com'],
        ['id'=>2, 'name' => 'Bruno', 'email' => 'bruno@email.pt'],
        ['id'=>3, 'name' => 'Marco', 'email' => 'marco@gmail.com'],
        ['id'=>4, 'name' => 'António', 'email' => 'antonio@gmail.com'],
    ];
    return $usersWithoutDB;
    } // fim da funcao loadUsersWDB

    // public function usersFromDB(){
    //     $usersFromDB = DB::table("users")->get();
    //     return $usersFromDB;
    // }

    public function deleteUsers(int $id) {
    $hasTasks = Task::where('user_id', $id)->exists();

    $hasGifts = Gift::where('user_id', $id)->exists();

    if ($hasTasks || $hasGifts) {
        return back()->with(
            'error',
            'Não é possível apagar este utilizador porque tem tarefas ou prendas associadas.'
        );
    }

    User::where('id', $id)->delete();

    return back()->with(
        'message',
        'Utilizador apagado com sucesso!'
    );
}

    public function editUsers($id){
        $userInfo = User::where('id', $id)->select("name", "email", "id", "address", "nif")
        ->first();
        return view("users.edituser", compact("userInfo"));
    }

    public function storeUsers(Request $request) {
        //dd($request->all());
        //validar os dados no servidor
        $request->validate([
        'name' => 'required|string|max:50',
        'email' => 'required|email|unique:users,email',
        'address' => 'nullable|string|max:255',
        'nif' => 'required|digits:9',
        'password' => 'required|min:8'
]);

        //depois de validados, inserir na bd
        User::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'address' => $request->address,
            'nif'=> $request->nif,
            'password'=> Hash::make($request->password)
        ]);

        return redirect()->route('users.all')->with('message', 'Utilizador adicionado com sucesso!');

    }


} // fim da classe UserController
