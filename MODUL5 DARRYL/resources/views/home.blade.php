@extends('layout.app')

@section('content')
<h1 class="text-center py-3">About Us</h1>
<div class="row">
    <div class="col-6 d-flex justify-content-center align-items-center">
        <img src="{{asset('images/about.png')}}" alt="">
    </div>
    <div class="col-6 d-flex align-items-center">
        <p style="line-height: 38px">Vaksinasi adalah pemberian vaksin untuk membantu sistem imun mengembangkan perlindungan dari suatu penyakit. Vaksinasi merupakan salah satu bentuk dari imunisasi. Vaksin sendiri mengandung mikroorganisme atau virus dalam keadaan lemah, hidup atau mati, atau mengandung protein atau toksin dari organisme.</p>
    </div>
</div>
@endsection