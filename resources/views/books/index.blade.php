<x-new-layout>
    <x-slot:title>Trang Index</x-slot>
<div class="container">
            <div class="row">
                @foreach($books as $book)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <a href="{{route('books.showUser',$book->id)}}">
                            <img src="{{ asset('images/').'/'. $book->photo}}" style="width: 300px; height: 300px;" class="card-img-top" alt="">
                         </a>
                        @foreach($book->categories as $category)

                            <span class="badge text-bg-warning">{{ $category->name }}</span>

                        @endforeach
                        <div class="card-body">
                        <a href="{{route('books.showUser',$book->id)}}"><h5 class="card-title">{{ $book->name }}</h5></a>
                            <p class="card-text">Price: {{ $book->price }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</x-new-layout>