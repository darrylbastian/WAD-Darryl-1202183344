<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vaccineController extends Controller
{
    //
    public function index(){
        return view('crud.createvaccine');
    }

    public function showData(){
        $allData = DB::table('vaccines')->paginate(5);
        return view('vaccine', compact('allData'));
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

        $vaccine = new Vaccine();
        $vaccine->name = $request->name;
        $vaccine->price = $request->price;
        $vaccine->description = $request->description;
        $vaccine->image = $pathImg;
        $vaccine->save();

        return redirect('vaccine');
    }

    public function update($id){
        $updateData = Vaccine::find($id);
        return view('crud.updatevaccine', compact('updateData'));
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

        $vaccine = Vaccine::find($id);

        $vaccine->name = $request->name;
        $vaccine->price = $request->price;
        $vaccine->description = $request->description;
        $vaccine->image = $pathImg;
        $vaccine->save();

        return redirect('vaccine');
    }

    public function delete($id){
        $vaccine = Vaccine::find($id);

        $vaccine->delete();
        
        return redirect('vaccine');
    }
}
