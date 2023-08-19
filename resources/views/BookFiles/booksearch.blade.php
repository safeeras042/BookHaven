@extends('layout')

@section('title', 'Search')

@section('content')


<div class="alert alert-info" style="width: 50%; margin: 0 auto; text-align: center; font-size:25px">Search Results for "{{ $query }}"</div>
@if ($books->isEmpty())
    <p>No results found.</p>
@else
    <div class="card-container">
        @foreach ($books as $book)
        <div class="card">
            <a href="{{route('book.show', ['id'=>$book->id])}}">
                <img src="{{ asset('uploads/bookcovers/'.$book->cover_image) }}" class="card-img-top" alt="...">
                <center>
                    <h4>{{$book->title}}</h4>
                    <p>{{ $book->author }}</p>
                    <h4>${{ $book->price }}</h4>
                    <div class="w">
                        <span>View Details</span>
                    </div>
                </center>
            </a>
        </div>
        @endforeach
    </div>


@endif
@endsection