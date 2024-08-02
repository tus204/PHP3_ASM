<x-new-layout>

    <x-slot:title>

        Trang {{$categoryName}}

        </x-slot>

        <div class="container">

            <div class="row">
                @if ($products)
                @foreach($products as $product)

                <div class="col-md-3">

                    <div class="card" style="width: 18rem;">

                        <a href="{{ route('../products.showUser', $product->id) }}">

                            <img src="{{ asset('images/') . '/' . $product->photo }}" style="width: 300px; height: 300px;" class="card-img-top" alt="">

                        </a>

                        <div class="card-body">

                            <a href="{{ route('products.showUser', $product->id) }}">
                                <h5 class="card-title">{{ $product->name }}</h5>
                            </a>

                            @foreach($product->categories as $category)

                            <span class="badge text-bg-warning">{{ $category->name }}</span>

                            @endforeach

                            @php

                            $description = trim(strip_tags($product->description));

                            if(strlen($description) >= 100){

                            $description = mb_substr($description, 0, mb_strpos($description, ' ', 100));

                            }

                            @endphp

                            <p class="card-text">{{ $description }}</p>

                            <p class="card-text">Price: {{ $product->price }}</p>

                        </div>

                    </div>

                </div>

                @endforeach
                @else
                <p>No products found</p>
                @endif

            </div>
            {{ $products->links() }}

        </div>

</x-new-layout>