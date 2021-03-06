@extends('master')

@section('content')

    <div class="container">
        <p><a href="{{ url('/buy') }}">Shop</a> / {{ $product->name }}</p>
        <h1>{{ $product->name }}</h1>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-responsive">
            </div>

            <div class="col-md-8">
                <h3>${{ $product->price }}</h3>
                <form action="{{ url('/bartender') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Cart">
                </form>




                <br><br>

                {{ $product->description }}
            </div> 
        </div> 

        <div class="spacer"></div>

        <div class="row">
            <h3>Also try these drinks</h3>

            @foreach ($interested as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="{{ url('buy', [$product->slug]) }}"><img src="{{ asset('img/' . $product->image) }}" alt="product" class="img-responsive"></a>
                            <a href="{{ url('buy', [$product->slug]) }}"><h3>{{ $product->name }}</h3>
                            <p>{{ $product->price }}</p>
                            </a>
                        </div> 

                    </div> 
                </div> 
            @endforeach

        </div> 

        <div class="spacer"></div>


    </div> 

@endsection
