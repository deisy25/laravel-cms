<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Workexperience;

class WorkexperiencesController extends Controller
{

    public function list()
    {
        return view('workexperiences.list', [
            'workexperiences' => Workexperience::all()
        ]);
    }

    public function addForm()
    {

        return view('workexperiences.add');
    }
    
    public function add()
    {
        $attributes = request()->validate([
            'companyName' => 'required',
            'position'=>'required',
            'responsibility'=>'required',
            'startDate'=>'required',
            'endDate'=>'required',
        ]);

        $workexperience = new Workexperience();
        $workexperience->companyName = $attributes['companyName'];
        $workexperience->position = $attributes['position'];
        $workexperience->responsibility = $attributes['responsibility'];
        $workexperience->startDate = $attributes['startDate'];
        $workexperience->endDate = $attributes['endDate'];
        $workexperience->save();

        return redirect('/console/workexperiences/list')
            ->with('message', 'Workexperiences record has been added!');
    }

    public function editForm(Workexperience $workexperience)
    {
        return view('workexperiences.edit', [
            'workexperience' => $workexperience,
        ]);
    }

    public function edit(Workexperience $workexperience)
    {

        $attributes = request()->validate([
            'companyName' => 'required',
            'position'=>'required',
            'responsibility'=>'required',
            'startDate'=>'required',
            'endDate'=>'required',
        ]);

        $workexperience->companyName = $attributes['companyName'];
        $workexperience->position = $attributes['position'];
        $workexperience->responsibility = $attributes['responsibility'];
        $workexperience->startDate = $attributes['startDate'];
        $workexperience->endDate = $attributes['endDate'];
        $workexperience->save();

        return redirect('/console/workexperiences/list')
            ->with('message', 'Workexperience record has been edited!');
    }

    public function delete(Workexperience $workexperience)
    {
        $workexperience->delete();
        
        return redirect('/console/workexperiences/list')
            ->with('message', 'Workexperience record has been deleted!');        
    }

}