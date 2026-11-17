<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class TaskController extends Controller
{
    public function AllTasks() {

        $tasksFromDB = $this->getAllTasks();


        return view("tasks.all_tasks", compact("tasksFromDB") );

    } // fim da funcao getalltasks

    protected function getAllTasks(){
       $tasksFromDB = Task::join("users", "tasks.user_id", "=", "users.id")
       ->select(
       'tasks.id',
       'tasks.name',
       'tasks.status',
       'tasks.due_at',
       'users.name as user_name'
       )
       ->get();

       //dd($tasksFromDB);
       return $tasksFromDB;
    } // fim da funcao alltasks


    public function deletetasks(int $id) {
    Task::where('id', $id)->delete();

    return back();
    }

    public function editTasks(int $id) {
        $taskInfo = Task::join("users", "tasks.user_id", "=", "users.id")
        ->where('tasks.id', $id)
        ->select("tasks.id",
        "tasks.name",
        "tasks.description",
        "tasks.status",
        "users.name as user_name")
        ->first();
        return view("tasks.edittask", compact("taskInfo"));
    }

    public function addTasks() {

    // Buscar os utilizadores à base de dados
    $users = User::select('id', 'name')->get();

    // Enviar os utilizadores para a view
    return view('tasks.addtask', compact('users'));
}

    public function storeTasks(Request $request) {
        //dd($request->all());
        //validar os dados no servidor
        $request->validate([
            'name' => 'required|max:50',
            'status' => 'required',
            'due_at'=> 'required'

        ]);

        //depois de validados, inserir na bd
        Task::join ('users', 'users.id', '=', 'tasks.id')
        ->insert([
            'name'=> $request->name,
            'status'=> $request->status,
            'due_at'=> $request->due_at,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso!');

    }


} // fim da classe TaskController
