<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function addtask(){
        $view_projects = Project::latest()->get();
        return view('dashboard.admin.addtask', compact('view_projects'));
    }
    public function createtask(Request $request){
        $request->validate([
            'task_name' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string', 'max:255'],
            'project_id' => ['nullable', 'string'],
        ]);

        $add_task = new Task();
        $add_task->task_name = $request->task_name;
        $add_task->priority = $request->priority;
        $add_task->project_id = $request->project_id;
        $add_task->ref_no = substr(rand(0,time()),0, 9);

        $add_task->save();

        if ($add_task) {
           return redirect()->back()->with('success', 'You have added task successfully');
        }

        return redirect()->back()->with('fail', 'You have not added task successfully');

    }


    public function viewtask(){
        $view_tasks = Task::orderBy('priority', 'ASC')->get();
        return view('dashboard.admin.viewtask', compact('view_tasks'));
    }

    public function edit($ref_no){
        $edit_task = Task::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.edit', compact('edit_task'));
    }

    


    public function updateetask(Request $request, $ref_no){
        $edit_task = Task::where('ref_no', $ref_no)->first();

        $request->validate([
            'task_name' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string', 'max:255'],
            'project_id' => ['nullable', 'string'],

        ]);
        $edit_task->project_id = $request->project_id;
        $edit_task->task_name = $request->task_name;
        $edit_task->priority = $request->priority;
        $edit_task->update();
        if ($edit_task) {
           return redirect()->back()->with('success', 'You have updated the task successfully');
        }

        return redirect()->back()->with('fail', 'You have not updated the task successfully');

    }

    
    public function destroy($ref_no){
        $delete_task = Task::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted the task successfully');
    }
}
