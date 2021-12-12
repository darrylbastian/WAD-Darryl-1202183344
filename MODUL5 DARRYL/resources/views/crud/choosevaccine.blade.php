@extends('layout.app')

@section('content')
<h2 class="text-center my-3">List Vaccine</h2>
<div class="row my-3">
    @foreach($showData as $ad)
    <div class="col-4 py-3">
        <div class="card">
            <img src="{{asset('public/'.$ad->image)}}" alt="" class="card-img-top">
            <h2 class="card-title">{{$ad->name}}</h2>
            <div class="card-body">
                <p>{{$ad->description}}</p>
            </div>
            <div class="card-footer">
                <a href="{{route('createpatient', $ad->id)}}" class="btn btn-primary" style="width: 100%;">Vaccine now</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="text-center">
    {{ $showData->onEachSide(5)->links() }}
</div>
</div>
@endsection