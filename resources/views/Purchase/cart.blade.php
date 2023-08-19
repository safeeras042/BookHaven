@extends('layout')
@section('title','buy')
@section('content')


<h1 class="custom-heading display-5">Cart</h1>
    <div class="line"></div><br>
@if(session('message'))
    <div class="alert alert-danger" style="width: 50%; margin: 0 auto; text-align: center;">
        {{ session('message') }}
    </div><br>
@endif

{{-- cart start --}}

@if(count($userItems) > 0)
    <div style="background-color: #ffffffd6; padding: 10px; width: 50%; margin: 0 auto; text-align: center; margin-bottom: 70px; border: 2px solid #b7adad; border-radius: 10px;">
        <table style="width: 100%; border-collapse: collapse;">
        @foreach ($userItems as $item)
            <tr>
                <td style="text-align: center;"><img src="{{asset('uploads/bookcovers/'.$bookInfo[$item->book_id]['cover_image'])}}" alt="" width="150px"></td>
                <td style="text-align: center; font-weight: bold; font-size: 20px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">{{$bookInfo[$item->book_id]['title']}}</td>
                <td style="text-align: center; font-weight: bold; font-size: 20px; padding:10px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">${{$bookInfo[$item->book_id]['price']}}</td>
                <td style="text-align: center; padding:10px">
                    <form action="{{ route('cart.remove', ['cart_id' => $item->cart_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- <input type="submit" value="Remove"> --}}
                        <div class="w3">
                            <a><span><button class="transparent-button2" type="submit">Remove</button></span></a>
                          </div>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="4"><hr style="border-top: 1px solid black;"></td>
            </tr>
        @endforeach
        </table>
        
        <!-- Total Price and Buy Button -->
        <p style="font-weight: bold; font-size: 25px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Total Price: ${{$totalPrice}}</p>
      
        <form action="{{route('book.purchase',['user_id'=>auth()->user()->id])}}" method="get">
            @csrf
            {{-- <input type="submit" value="Buy" style="font-weight: bold; font-size: 16px;"> --}}
            <center>
            <div class="wrapper">
                <a class="w4"><span><button class="transparent-button3" action="submit">Proceed</button></span></a>
              </div></center>
    </div>
@else
    <div class="alert alert-warning "style="width: 50%; margin: 0 auto; text-align: center;">
        Your cart is empty.
    </div>
@endif



{{-- end --}}

@endsection

