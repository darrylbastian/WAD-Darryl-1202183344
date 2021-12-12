@extends('layout.app')

@section('content')
<h2 class="text-center my-3">Input Vaccine</h2>
<div class="row my-3">
    <div class="col py-3">
        <form action="{{route('createvaccine')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Vaccine Name</label>
                <input type="text" class="form-control" name="name" placeholder="name@example.com">
            </div>
            <label for="exampleFormControlInput1">Price</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="validatedInputGroupPrepend">Rp</span>
                </div>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <button type="submit" class="btn btn-primary py-2 px-4 mt-4">Submit</button>
        </form>
    </div>
</div>
@endsection