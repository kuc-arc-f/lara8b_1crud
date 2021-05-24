<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
  /**************************************
   *
   **************************************/
  public function __construct(){
    $this->middleware('auth');
  }
  /**************************************
   *
   **************************************/
  public function index()
  {
    $page = 1;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }
    $tasks = Task::orderBy('id', 'desc')->paginate(10 );
    return view('tasks/index')->with([
      'tasks', $tasks , 'page' => $page,
    ]);
  } 
  /**************************************
   *
   **************************************/
  public function create()
  {
    return view('tasks/create')->with('task',  null);
  }
  /**************************************
   * 入力値の検証
   **************************************/    
  private function validator(array $data)
  {
    return Validator::make($data, [
        'title' => ['required', 'string', 'max:255'],
    ]);
  }
  /**************************************
   *
   **************************************/
  public function show($id)
  {
    return view('tasks/show')->with('task_id', $id );
  }
  /**************************************
   *
   **************************************/
  public function edit($id)
  {
    $task = Task::find($id);
    return view('tasks/edit')->with([
      'task'=>$task, 'task_id'=>$id
    ]);
  }         

  
}
