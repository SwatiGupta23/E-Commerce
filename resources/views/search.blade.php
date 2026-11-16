@extends('app')

@section('content')

<div class="treding-wrapper mt-2">
        <h2 class="text-center fw-bold mb-4">Result Product</h2>
        <div class="d-flex justify-content-around">
            @foreach ($products as $item)
            <div class="">
                <a href="detail/{{$item['id']}}">
                    <img src="{{$item['gallery']}}" alt="Los Angeles" class="d-block treding-img rounded-2" style="width:200px;height:300px">
                    <div class="text-center">
                        <h6 class="fw-bold mt-1">{{$item['name']}}</h6>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>


@endsection();