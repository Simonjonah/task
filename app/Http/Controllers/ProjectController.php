<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    
    public function addprojects(){

        return view('dashboard.admin.addprojects');
    }
    public function createprojects(Request $request){
        $request->validate([
            'project_name' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
        ]);

        $add_task = new Project();
        $add_task->project_name = $request->project_name;
        $add_task->body = $request->body;
        $add_task->ref_no = substr(rand(0,time()),0, 9);

        $add_task->save();

        if ($add_task) {
           return redirect()->back()->with('success', 'You have added project successfully');
        }

        return redirect()->back()->with('fail', 'You have not added project successfully');

    }


    public function viewprojects(){
        $view_projects = Project::latest()->get();
        return view('dashboard.admin.viewprojects', compact('view_projects'));
    }

    public function projectedit($ref_no){
        $edit_project = Project::where('ref_no', $ref_no)->first();
        return view('dashboard.admin.projectedit', compact('edit_project'));
    }

    


    public function updateprojects (Request $request, $ref_no){
        $edit_project = Project::where('ref_no', $ref_no)->first();

        $request->validate([
            'project_name' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
        ]);
        $edit_project->project_name = $request->project_name;
        $edit_project->body = $request->body;
        $edit_project->update();
        if ($edit_project) {
           return redirect()->back()->with('success', 'You have updated the project successfully');
        }

        return redirect()->back()->with('fail', 'You have not updated the project successfully');

    }

    
    public function projectdestroy($ref_no){
        $delete = Project::where('ref_no', $ref_no)->delete();
        return redirect()->back()->with('success', 'You have deleted the task successfully');
    }

    
    public function viewprojectask($id){
        $project = Project::where('id', $id)->first();
        $view_project_tasks = Task::where('project_id', $id)->orderByRaw('ISNULL(priority), priority ASC')->get();
        return view('dashboard.admin.viewprojectask', compact('project', 'view_project_tasks'));
    }
}

