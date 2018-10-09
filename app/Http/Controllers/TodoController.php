<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodoController extends Controller
{
    public function index(){
    	//lay tat ca du lieu trong ban ghi todo

    	$todos = Todo::all();

    	return view('todo.index',[
    		'todos' => $todos,
    		'title' => 'Danh sách công việc'
    	]);
    }

    public function create(){
    	return view('todo.create');
    }
    public function store(Request $request){
        
        Todo::store($request->all());

        return redirect('todos');
    }

    public function show($id){
        $todo = Todo::find($id);

        return view('todo.show', ['todo' => $todo]);
    }

    public function destroy($id){
        Todo::find($id)->delete();
         return redirect('todos');
    }

    public function edit($id){
         $todo = Todo::find($id);
          return view('todo.edit', ['todo' => $todo]);
    }

    public function update($id, Request $request){
        Todo::updateData($id ,$request->all());
        return redirect('todos');
    }
}
