@extends('layout')

@section('title', 'My Books')

@section('content')



<h1 class="custom-heading display-4">My Books</h1>
    <div class="line"></div>

{{-- card --}}

        <div class="card-container">
            @if(count($purchases) > 0)
                @foreach ($purchases as $purchase)
                <div class="card">
                    <a href="{{ route('book.read', ['id' => $purchase->book->id]) }}">
                        <img src="{{asset('uploads/bookcovers/'.$purchase->book->cover_image)}}" class="card-img-top" alt="...">
                        <center>
                            <h4>{{$purchase->book->title}}</h4>
                            <p>{{$purchase->book->author}}</p>
                            <div class="w">
                                <span>Read Book</span>
                            </div>
                        </center>
                    </a>
                </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" style="margin-top: 40px; font-size:25px">
                You don't own any books.
            </div>
        @endif
    </div>
</div>

@endsection