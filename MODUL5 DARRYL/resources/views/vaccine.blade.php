@extends('layout.app')

@section('content')
<div class="row my-3">
    @if($allData->count() === 0)
    <div class="col py-3 text-center">
        <p class="text-muted text-center">there is no data ...</p>
        <a href="{{route('create')}}" class="btn btn-primary py-2 px-5">Add Vaccine</a>
    </div>
    @elseif($allData->count() !== 0)
    <div class="col py-3">
        <h2 class="text-center">List Vaccine</h2>
        <a href="{{route('create')}}" class="btn btn-primary py-2 px-4 my-4">Add Vaccine</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col" class="w-25">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allData as $ad)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$ad->name}}</td>
                    <td>{{$ad->price}}</td>
                    <td>
                        <form class=" d-inline-block" action="">
                            <a href="{{route('updatevaccine', $ad->id)}}" class="btn btn-warning py-2 px-4">Update</a>
                            <a href="" class="btn btn-danger py-2 px-4" data-toggle="modal" data-target="#modal-delete">Delete</a>
                        </form>
                    </td>
                </tr>

                <div class="modal" tabindex="-1" role="dialog" id="modal-delete">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('deletevaccine', $ad->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Ya</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto text-center">
            {{$allData->links()}}
        </div>
    </div>
    @endif
</div>
@endsection