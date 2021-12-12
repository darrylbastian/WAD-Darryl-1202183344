@extends('layout.app')

@section('content')
<div class="row text-center my-3">
    @if($allData->count() === 0)
    <div class="col py-3">
        <p class="text-muted">there is no data ...</p>
        <a href="{{route('choose')}}" class="btn btn-primary py-2 px-5">Register Patient</a>
    </div>
    @elseif($allData->count() !== 0)
    <div class="col py-3">
        <h2 class="text-center">List Patient</h2>
        <a href="{{route('choose')}}" class="btn btn-primary py-2 px-4 my-4">Register Patient</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Hp</th>
                    <th scope="col" class="w-25">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allData as $ad)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$ad->name}}</td>
                    <td>{{$ad->nik}}</td>
                    <td>{{$ad->alamat}}</td>
                    <td>{{$ad->no_hp}}</td>
                    <td>
                        <form class="d-inline-block" action="">
                            <a href="{{route('updatepatient', $ad->id)}}" class="btn btn-warning py-2 px-4">Update</a>
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
                                <form action="{{route('deletepatient', $ad->id)}}" method="post">
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