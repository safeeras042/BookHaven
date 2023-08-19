@extends('layout')

@section('title', 'Home')

@section('content')
@if(session('message'))
    <div class="alert alert-info" style="width: 50%; margin: 0 auto; text-align: center;">
        {{ session('message') }}
    </div>
@endif
    


{{-- heading --}}
<h1>
    @if (!empty($requestedCategory))
     
      <h1 class="custom-heading display-3">{{ ucfirst($requestedCategory) }} Books</h1>
    <div class="line"></div>
    @else
   
    <h1 class="custom-heading display-4">All Books</h1>
    <div class="line"></div>
    @endif
    
</h1>
{{-- heading end --}}

{{-- filter --}}<br>
<div class="custom-filter">
    <form action="{{ route('book.index') }}" method="GET" class="filter-form">
        <select class="form-control" id="category" name="category">
            <option value="">Select a Category</option>
            <option value="">All</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary custom-button">Filter</button>
    </form>
</div>


{{-- filter end --}}

{{-- card --}}
<div class="card-container">
    @foreach ($data as $book)
    <div class="card">
        <a href="{{route('book.show', ['id'=>$book->id])}}">
            <img src="{{ asset('uploads/bookcovers/'.$book->cover_image) }}" class="card-img-top" alt="...">
            <center>
                <h4>{{ $book->title }}</h4>
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
  
@endsection