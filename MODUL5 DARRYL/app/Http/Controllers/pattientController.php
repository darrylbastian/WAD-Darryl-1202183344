<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pattientController extends Controller
{
    //
    public function showData(){
        $allData = Patient::paginate(6);
        return view('patient', compact('allData'));
    }

    public function showVaccine(){
        $showData = Vaccine::paginate(3);
        return view('crud.choosevaccine', compact('showData'));
    }

    public function create(){
        return view('crud.createpatient');
    }
    public function store(Request $request){
        if ($files = $request->file('image')) {
            $destinationPath = 'public/store/';
            $file = $request->file('image');
            // upload path         
            $profileImage = rand(1000, 20000) . "." .
                $files->getClientOriginalExtension();
            $pathImg = $file->storeAs('store', $profileImage);
            $files->move($destinationPath, $profileImage);
        }

        $patient = new Patient();
        $patient->vaccine_id = $request->id_vaccine;
        $patient->name = $request->name;
        $patient->nik = $request->nik;
        $patient->alamat = $request->alamat;
        $patient->image_ktp = $pathImg;
        $patient->no_hp = $request->no_hp;
        $patient->save();

        return view('patient');
    }

    public function update($id){
        $updateData = Patient::find($id);
        return view('crud.updatepatient', compact('updateData'));
    }

    public function updateProcess(Request $request, $id){

        if ($files = $request->file('image')) {
            $destinationPath = 'public/store/';
            $file = $request->file('image');
            // upload path         
            $profileImage = rand(1000, 20000) . "." .
                $files->getClientOriginalExtension();
            $pathImg = $file->storeAs('store', $profileImage);
            $files->move($destinationPath, $profileImage);
        }

        $patient = Patient::find($id);

        $patient->name = $request->name;
        $patient->nik = $request->nik;
        $patient->alamat = $request->alamat;
        $patient->image_ktp = $pathImg;
        $patient->no_hp = $request->no_hp;
        $patient->save();

        return redirect('patient');
    }

    public function delete($id){
        $patient = Patient::find($id);

        $patient->delete();
        
        return redirect('patient');
    }
}
