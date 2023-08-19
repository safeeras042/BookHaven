@extends('layout')

@section('title', 'test')

@section('content')

<br>

{{-- n --}}
  <center><button class="btn-34"><span>Button</span></button></center><br>
  



{{-- button 2 --}}
  <div class="buttons">
    <div class="container">
        <a href="{{route('book.index')}}" class="btn effect01"><span>Hover</span></a>
    </div>
  </div>
<br>

  <div class="buttons">
    <div class="container">
      <button class="btn effect01"><span>Hover</span></button>
    </div>
  </div>
  {{-- end --}}

  
  {{-- button 3 --}}

  <button class="button3"><span>Hover me!</span></button>
  {{-- end --}}<br>

 



  <div class="middle">
    <a href="" class="btn btn1">Hover Me</a>

  </div>


  <div class="wrapper">
  <a class="w2"><span>Hover Me!</span></a>
</div>

<button class="grow_box buttonz">GROW BOX</button>
<i class="bi bi-wifi"></i>



@endsection