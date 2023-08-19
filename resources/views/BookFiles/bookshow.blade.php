@extends('layout')

@section('title', 'Book')

@section('content')
<h1 class="custom-heading display-5">Book Details</h1>
    <div class="line"></div><br>


    @if(session('message'))
                <div class="alert alert-danger centered-alert">
                    {{ session('message') }}
                </div>
            @endif

{{-- details start --}}

<div style="display: flex; align-items: flex-start; border: 1px solid #dfd8d8ae; background-color: rgba(255, 255, 255, 0.807); padding: 10px; width: 1000px; margin: 0 auto; margin-bottom: 70px; flex-wrap: wrap; border-radius: 10px;">
    <div style="flex: 1; text-align: left;">
        <div style="border: 1px solid #ddd5d5e0; display: inline-block; padding: 5px; ">
            <img src="{{ asset('uploads/bookcovers/'.$book->cover_image) }}" width="350px">
        </div><br>
    </div>
    <div style="flex: 2; padding-left: 10px; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            <center><h4>{{ $book->title }}</h4> <br>
                <h5> By: {{ $book->author }}</h5><br></center>
            <span class="p-custom">BOOK SUMMARY: {{ $book->description }}</span><br>
            <span class="p-custom">Publication Date: {{ $book->publication_date }}</span>
        </div>
        <div style="align-self: flex-end;">
            <h3 style="margin-bottom: 0;"> Price: ${{ $book->price }}</h3>
            
        </div>
        @if (auth()->check())
            <form action="{{ route('add.cart') }}" method="post">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                @if ($userOwnsBook)
                    <div class="wrapper">
                        <a id="submitBtn" class="w2"><span> <button class="transparent-button" disabled>You own this book</button></span></a>    
                    </div>
                @else
                    <div class="wrapper">
                        <a id="submitBtn" class="w2"><span> <button class="transparent-button" type="submit">Add to Cart</button></span></a>
                    </div>
                @endif
            </form>
        @else
            <div class="alert alert-danger" role="alert">
                Please <a href="{{ route('login') }}">log in</a> to add this book to your cart.
            </div>
        @endif
    </div>
</div>









@endsection