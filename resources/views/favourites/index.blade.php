<x-new-layout>
    <x-slot:title>
        Trang Yêu Thích
    </x-slot:title>

    <div class="container-fluid" style="margin-top: 160px;">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                        <div class="iq-card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="col-6 p-0 position-relative change-ragle">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        data-photo="{{ asset('images/' . $book->photo) }}"
                                        data-name="{{ $book->name }}" data-price="{{ $book->price }}"
                                        data-author="{{ $book->author }}" data-description="{{ $book->description }}"
                                        data-url="{{ route('books.showUser', $book->id) }}">
                                        <img class="img-fluid rounded w-100" src="{{ asset('images/' . $book->photo) }}"
                                            alt="{{ $book->name }}">
                                    </a>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <h6 class="mb-1"><a
                                                href="{{ route('books.showUser', $book->id) }}">{{ $book->name }}</a>
                                        </h6>
                                        <div class="d-block">
                                            <span class="font-size-13 text-warning">
                                                @php $averageRating = $book->average_rating; @endphp
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < floor($averageRating))
                                                        <i class="fa fa-star mr-1"></i>
                                                    @elseif ($i < ceil($averageRating) && $i < $averageRating)
                                                        <i class="fa fa-star-half-o mr-1"></i>
                                                    @else
                                                        <i class="fa fa-star-o mr-1"></i>
                                                    @endif
                                                @endfor
                                            </span>
                                        </div>
                                    </div>
                                    <div class="price d-flex align-items-center">
                                        <h6><b>{{ $book->price }} đ</b></h6>
                                    </div>
                                    <div class="iq-product-action">
                                       
                                        <a  class="ml-2 remove-favorite-button"
                                            data-book-id="{{ $book->id }}">
                                            <i class="ri-delete-bin-6-fill text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.remove-favorite-button').on('click', function() {
                var bookId = $(this).data('book-id');
                var csrfToken = "{{ csrf_token() }}";

                $.ajax({
                    url: "{{ route('remove_favorite') }}",
                    type: "POST",
                    data: {
                        book_id: bookId,
                        _token: csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Book removed from favorites successfully!');
                            location.reload();  
                        } else {
                            alert('There was an error: ' + response.message);
                        }
                    },
                });
            });
        });
    </script>
</x-new-layout>
