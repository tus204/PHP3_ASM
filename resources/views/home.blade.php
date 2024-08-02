<x-new-layout>
    <x-slot:title>
        Trang Home
    </x-slot:title>

    <!-- Wrapper Start -->
    <div class="wrapper">

        <!-- Page Content -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <!-- Page Content -->
                    <div id="content-page" class="content-page">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="iq-card-transparent mb-0">
                                        <div class="d-block text-center">
                                            <h2 class="mb-3">Search by Book Name</h2>
                                            <div class="w-100 iq-search-filter position-relative" style="max-width: 800px; margin: 20px auto;">
                                                <form role="search">
                                                    <div class="form-group position-relative">
                                                        <input type="text" class="form-control input-search-ajax" placeholder="Search Book">
                                                        <div class="search-ajax-result position-absolute">
                                                            {{-- Item ajax search --}}
                                                            {{-- Xu ly ajax duoi js day len day --}}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="iq-card">
                                        <div class="iq-card-body">
                                            <div class="row">
                                                @foreach ($books as $book)
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                                        <div class="iq-card-body p-0">
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-6 p-0 position-relative change-ragle">
                                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-photo="{{ asset('images/' . $book->photo) }}" data-name="{{ $book->name }}" data-price="{{ $book->price }}" data-author="{{ $book->author }}" data-description="{{ $book->description }}" data-url="{{ route('books.showUser', $book->id) }}">
                                                                        <img class="img-fluid rounded w-100" src="{{ asset('images/' . $book->photo) }}" alt="{{ $book->name }}">
                                                                    </a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-2">
                                                                        <h6 class="mb-1"><a href="{{ route('books.showUser', $book->id) }}">{{ $book->name }}</a></h6>
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
                                                                        <a href="javascript:void(0);" class="add-to-cart" data-book-id="{{ $book->id }}">
                                                                            <i class="ri-shopping-cart-2-fill text-primary"></i>
                                                                        </a>
                                                                        <a href="javascript:void(0);" class="ml-2 favorite-button" data-book-id="{{ $book->id }}">
                                                                            <i class="ri-heart-fill text-danger"></i>
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
                                    </div>
                                </div>
                                <!-- Best Seller -->
                                <div class="col-lg-6">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                        <div class="iq-card-header d-flex justify-content-between mb-0">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Best Seller</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="row align-items-center">
                                                <div class="col-sm-5 pr-0">
                                                    <a href="{{ route('books.showUser', 1) }}"><img class="img-fluid rounded w-100" src="{{ asset('images/bo2.jpg') }}" alt=""></a>
                                                </div>
                                                <div class="col-sm-7 mt-3 mt-sm-0">
                                                    <h4 class="mb-2">Sách giáo khoa bộ lớp 2</h4>
                                                    <div class="mb-2 d-block">
                                                        <span class="font-size-12 text-warning">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>
                                                    </div>
                                                    <span>price: 150 000 đồng</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                        <div class="iq-card-header d-flex justify-content-between mb-0">
                                            <div class="iq-header-title">
<h4 class="card-title">Thể loại</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <ul class="list-inline row mb-0 align-items-center iq-scrollable-block">
                                                @foreach ($categories as $category)
                                                <li class="col-sm-6 d-flex mb-3 align-items-center">
                                                    <div class="mt-1">
                                                        <a href="{{ route('booksByCategory', ['category' => $category->name]) }}">
                                                            {{ $category->name }}
                                                            ({{ count($category->books) }})
                                                        </a>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Trendy books -->

                    <div class="col-lg-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 trendy-detail">
                                <div class="iq-header-title">
                                    <h4 class="card-title mb-0">Trendy Books</h4>
                                </div>
                            </div>
                            <div class="iq-card-body trendy-contens">
                                <ul id="trendy-slider" class="list-inline p-0 mb-0 row">
                                    @foreach ($books as $book)
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                            <div class="iq-card-body p-0">
                                                <div class="d-flex align-items-center">
<div class="col-6 p-0 position-relative change-ragle">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-photo="{{ asset('images/') . '/' . $book->photo }}" data-name="{{ $book->name }}" data-price="{{ $book->price }}" data-author="{{ $book->author }}" data-description="{{ $book->description }}" data-url="{{ route('books.showUser', $book->id) }}">
                                                            <img class="img-fluid rounded w-100" src="{{ asset('images/') . '/' . $book->photo }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-2">
                                                            <h6 class="mb-1"><a href="{{ route('books.showUser', $book->id) }}">{{ $book->name }}</a>
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
                                                            <a class="add-to-card"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                                            <a href="javascript:void(0);" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-custom-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Book Details</h5>
                            <button type="button" style="color: red" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="bookPhoto" class="img-fluid rounded mb-3" src="" alt="" style="max-width: 200px;">
                            <h5 id="bookName"></h5>
                            <p>Price: <span id="bookPrice"></span> đ</p>
                            {{-- <p>Description: <span id="bookDescription"></span></p> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="#" id="accessLink" class="btn btn-success">Access</a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                // An khi xoa het chu
                function clearInput() {
                    document.getElementById('searchInput').value = '';
                    // Optionally, clear the search results as well
                    document.querySelector('.search-ajax-result').innerHTML = '';
                    $('.search-ajax-result').hide();
                }

                // Show chi tiet modal
                $('[data-bs-toggle="modal"]').on('click', function() {
                    var photo = $(this).data('photo');
                    var name = $(this).data('name');
                    var price = $(this).data('price');
                    var description = $(this).data('description');
                    var detailUrl = $(this).data('url');

                    if (description.length > 200) {
                        description = description.substring(0, 200) + '...';
                    }

                    $('#bookPhoto').attr('src', photo);
                    $('#bookName').text(name);
                    $('#bookPrice').text(price);
                    $('#bookDescription').text(description);
                    $('#accessLink').attr('href', detailUrl);
                });

                // Hide search results
                $('.search-ajax-result').hide();

                // AJAX search
                $(document).ready(function() {
                    $('.input-search-ajax').keyup(function() {
                        var _text = $(this).val();
                        if (_text == '') {
                            $('.search-ajax-result').html("");
                            $('.search-ajax-result').hide(500);
                            return;
                        } else {
                            $.ajax({
                                url: "{{ route('ajax-search-book') }}?key=" + _text,
                                type: "GET",
                                success: function(data) {
                                    var _html = '';
                                    for (var book of data) {
                                        _html +=
                                            '<div class="media d-flex align-items-center mb-2 p-2 border rounded">';
                                        _html += '    <a href="/books/' + book.id +
                                            '" class="pull-left mr-3">';
                                        _html +=
                                            '        <img class="media-object rounded" src="images/' +
                                            '/' + book.photo +
                                            '" alt="image" style="width: 40px; height: 40px;">';
                                        _html += '    </a>';
                                        _html += '    <div class="media-body">';
                                        _html +=
                                            '        <h4 class="media-heading mb-1" style="margin-left: 20px;"><a href="/books/' +
                                            book.id + '">' + book.name + '</a></h4>';
                                        _html +=
                                            '        <p class="mb-0" style="margin-left: 20px;">Price: ' +
                                            book.price + ' đồng</p>';
                                        _html += '    </div>';
                                        _html += '</div>';
                                        $('.search-ajax-result').show(500);
                                        $('.search-ajax-result').html(_html);
                                    }
                                }
                            });
                        }
                    });
                });

                // Ajax add to cart
                $(document).ready(function() {
                    $('.add-to-cart').on('click', function() {
                        var bookId = $(this).data('book-id');
                        var userId = "{{ auth()->check() ? auth()->user()->id : null }}";

                        if (!userId) {
                            alert('You need to log in to add to the cart.');
                            return;
                        }
                        $.ajax({
                            url: "{{ route('add_to_cart', ['id' => 'BOOK_ID', 'user_id' => 'USER_ID']) }}"
                                .replace('BOOK_ID', bookId)
                                .replace('USER_ID', userId),
                            type: "GET",
                            success: function(response) {
                                if (response.success) {
                                    alert('Book added to cart successfully!');
                                } else {
                                    alert('There was an error adding the book to the cart: ' + response
                                        .message);
                                }
                            },
                        });
                    });
                });

                // Khi load trang thì vẫn load dữ liệu mới
                $(document).ready(function() {
                    var userId = "{{ auth()->check() ? auth()->user()->id : null }}";

                    if (userId) {
                        updateCartItems(userId);
                    }

                    // click add to cart
                    $(document).on('click', '.add-to-cart', function() {
                        var userId = "{{ auth()->check() ? auth()->user()->id : null }}";

                        if (userId) {
                            updateCartItems(userId);
                        }
                    });

                    function updateCartItems(userId) {
                        $.ajax({
                            url: "{{ route('get_cart_items', ['user_id' => 'USER_ID']) }}".replace('USER_ID', userId),
                            type: "GET",
                            success: function(cartItems) {
                                var cartDropdown = $('.toggle-cart-info .cart-items');
                                var cartCount = cartItems.length;
                                var cartHTML = '';

                                cartItems.forEach(function(item) {
                                    var bookName = item.book.name;
                                    if (bookName.length > 50) {
                                        bookName = bookName.substring(0, 50) + '...';
                                    }
                                    cartHTML += '<div class="media align-items-center" data-id="' + item.book.id + '">' +
                                        '<div class="">' +
                                        '<img class="rounded" src="' + '{{ asset('images') }}/' + item.book.photo + '" alt="">' +
                                        '</div>' +
                                        '<div class="media-body ml-3">' +
                                        '<h6 class="mb-0"><a href="/books/' + item.book.id + '">' + bookName + '</a></h6>' +
                                        '<p class="mb-0">' + item.book.price + ' đồng</p>' +
                                        '</div>' +
                                        '</div>';
                                });

                                cartDropdown.html(cartHTML);
                                $('.count-cart').text(cartCount);
                                $('.toggle-cart-info .badge-light').text(cartCount);
                            },
                            error: function(xhr, status, error) {
                                console.error("Error fetching cart items: ", error);
                            }
                        });
                    }
                });

                // AJAX favorite button
                $(document).ready(function() {
                    $('.favorite-button').on('click', function() {
                        var bookId = $(this).data('book-id');
                        var csrfToken = "{{ csrf_token() }}";

                        $.ajax({
                            url: "{{ route('favorite_book') }}",
                            type: "POST",
                            data: {
                                book_id: bookId,
                                _token: csrfToken
                            },
                            success: function(response) {
                                if (response.success) {
                                    alert('Book added to favorites successfully!');
                                } else {
                                    alert('There was an error: ' + response.message);
                                }
                            },
                        });
                    });
                });
            </script>

            {{-- Chat tu động --}}
            <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
            <df-messenger
                intent="WELCOME"
                class="chat"
                chat-title="Tu Van Shop Sach"
                agent-id="7c4fb505-da08-42e3-80ce-256725bcbfc0"
                language-code="vi">
            </df-messenger>


</x-new-layout>
