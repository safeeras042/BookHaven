@extends('layout')

@section('title', 'Purchase')

@section('content')



<h1 class="custom-heading display-5">Order Summary</h1>
    <div class="line"></div><br>




@if ($errors->any())
    <div class="alert alert-danger" style="width: 50%; margin: 0 auto; text-align: center; margin-bottom:10px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div style="background-color: #f9f9f995; padding: 10px; width: 50%; margin: 0 auto; text-align: center; margin-bottom: 70px; border: 2px solid #b7adad; border-radius: 10px; ">
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
    
        <label for="payment_type" style="font-size:30px">Payment Type:</label>
        <select name="payment_type" id="payment_type" class="custom-select">
        <option value="Debit Card">Debit Card</option>
        <option value="UPI">UPI</option>
        <option value="Net Banking">Net Banking</option>
        </select>
   <br><br>
    
        <input type="text" name="name" class="custom-input" placeholder="Enter your name"><br><br>
        
        <textarea id="billing_address" name="billing_address" rows="5" cols="40" placeholder="Enter your Billing Address" class="custom-input2"></textarea>
        <hr style="border-top: 1px solid black;">
    <table style="width: 100%; border-collapse: collapse;">
            @foreach ($userItems as $item)
                <tr>
                    <td style="text-align: center;"><img src="{{asset('uploads/bookcovers/'.$bookInfo[$item->book_id]['cover_image'])}}" alt="" width="150px"></td>
                    <td style="text-align: center; font-weight: bold; font-size: 20px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">{{$bookInfo[$item->book_id]['title']}}</td>
                    <td style="text-align: center; font-weight: bold; font-size: 20px; padding:10px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">${{$bookInfo[$item->book_id]['price']}}</td>
                </tr>
                <tr>
                    <td colspan="4"><hr style="border-top: 1px solid black;"></td>
                </tr>
            @endforeach
        </table>
        

        <p style="font-weight: bold; font-size: 25px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Total Price: ${{$totalPrice}}</p>
        <input type="hidden" name="user_id" value="{{ $user_id }}">
    
        @foreach ($book_ids as $book_id)
            <input type="hidden" name="book_ids[]" value="{{ $book_id }}">
        @endforeach
            <center>
                <div class="wrapper">
                    <a class="w4"><span><button class="transparent-button3" action="submit">Buy</button></span></a>
                </div>
            </center>
        </form>
    </div>

















@endsection