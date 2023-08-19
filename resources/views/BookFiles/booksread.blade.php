@extends('layout')

@section('title', 'My Books')

@section('content')



<div class="center-container" style="margin-bottom:50px;"> 
    <div class="book-container">
        <center><h1 class="book-title">{{ $book->title }}</h1></center>
        <center> <p class="book-author">By {{ $book->author }}</p></center>
       
        <hr>
        <div class="book-content">
            {!! nl2br($book->content) !!} 
        </div>
    </div>
</div>


@endsection