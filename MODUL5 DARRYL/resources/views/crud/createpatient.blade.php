@extends('layout.app')

@section('content')
<h2 class="text-center my-3">Register Patient</h2>
<div class="row my-3">
    <div class="col py-3">
        <form action="{{route('createdata', request()->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">id vaccine</label>
                <input type="text" class="form-control" name="id_vaccine" value="{{request()->id}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Patient Name</label>
                <input type="text" class="form-control" name="name" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">NIK</label>
                <input type="text" class="form-control" name="nik">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">KTP</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">No. Hp</label>
                <input type="text" class="form-control" name="no_hp">
            </div>
            
            <button type="submit" class="btn btn-primary py-2 px-4 mt-4">Submit</button>
        </form>
    </div>
</div>
@endsection