@extends('layout.app')

@section('content')
<h2 class="text-center my-3">Input Vaccine</h2>
<div class="row my-3">
    <div class="col py-3">
        <form action="{{route('update', $updateData->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Vaccine Name</label>
                <input type="text" name="name" class="form-control" value="{{$updateData->name}}" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <label for="exampleFormControlInput1">Price</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="validatedInputGroupPrepend">Rp</span>
                </div>
                <input type="text" name="price" class="form-control" value="{{$updateData->price}}" aria-describedby="validatedInputGroupPrepend" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$updateData->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" name="image" class="form-control-file" value="{{$updateData->image}}">
            </div>
            <button type="submit" class="btn btn-primary py-2 px-4 mt-4">Submit</button>
        </form>
    </div>
</div>
@endsection