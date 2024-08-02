<x-new-layout>
    <x-slot:title>{{ $book->name }}</x-slot>
    <style>
        a {
            text-decoration: none !important;
            color: inherit;
        }

        a:hover {
            color: #455A64;
        }

        .card {
            border-radius: 5px;
            background-color: #fff;
            margin-top: 30px;
            border: #455A64 1px solid;
        }

        df-messenger {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 1000;
        }

        .rating-box {
            width: 130px;
            height: 130px;
            margin-right: auto;
            margin-left: auto;
            background-color: #FBC02D;
            color: #fff;
        }

        .rating-label {
            font-weight: bold;
        }

        .rating-bar {
            width: 300px;
            padding: 8px;
            border-radius: 5px;
        }

        .bar-container {
            width: 100%;
            background-color: #f1f1f1;
            text-align: center;
            color: white;
            border-radius: 20px;
            cursor: pointer;
            margin-bottom: 5px;
        }

        .bar-5,
        .bar-4,
        .bar-3,
        .bar-2,
        .bar-1 {
            height: 13px;
            background-color: #FBC02D;
            border-radius: 20px;
        }

        .bar-5 {
            width: 70%;
        }

        .bar-4 {
            width: 30%;
        }

        .bar-3 {
            width: 20%;
        }

        .bar-2 {
            width: 10%;
        }

        .bar-1 {
            width: 0%;
        }

        td {
            padding-bottom: 10px;
        }

        .star-active {
            color: #FBC02D;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .star-active:hover {
            color: #F9A825;
            cursor: pointer;
        }

        .star-inactive {
            color: #CFD8DC;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .blue-text {
            color: #0091EA;
        }

        .content {
            font-size: 18px;
        }

        .profile-pic {
            width: 90px;
            height: 90px;
            border-radius: 100%;
            margin-right: 30px;
        }

        .pic {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        .vote {
            cursor: pointer;
        }

        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

        html,
        body {
            height: 100%;
        }

        .comment-box {
            padding: 5px;
        }

        .comment-area textarea {
            resize: none;
            border: 1px solid #ad9f9f;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #ffffff;
            outline: 0;
            box-shadow: 0 0 0 1px rgb(255, 0, 0) !important;
        }

        .send {
            color: #fff;
            background-color: #ff0000;
            border-color: #ff0000;
        }

        .send:hover {
            color: #fff;
            background-color: #f50202;
            border-color: #f50202;
        }

        .rating {
            display: flex;
            margin-top: -10px;
            flex-direction: row-reverse;
            margin-left: -4px;
            float: left;
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            position: relative;
            width: 19px;
            font-size: 25px;
            color: #ff0000;
            cursor: pointer;
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0;
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important;
        }

        .rating>input:checked~label:before {
            opacity: 1;
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4;
        }

        .botSection {
            border-radius: 50%;
            overflow: hidden;
            width: 150px;
            height: 150px;
        }

        .botSection .messages {
            padding: 10px;
        }

        .col-md-3 {
            line-height: 150px;
        }

        .col-md-4 {
            line-height: 60px;
        }
    </style>

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Thông tin</h4>
                        </div>
                        <div class="iq-card-body pb-0">
                            <div class="description-contens align-items-top row">
                                <div class="col-md-6">
                                    <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                        <div class="iq-card-body p-0">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <img src="{{ asset('images/' . $book->photo) }}"
                                                        class="img-fluid w-100 rounded" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                        <div class="iq-card-body p-0">
                                            <h3 class="mb-3">{{ $book->name }}</h3>
                                            <div class="price d-flex align-items-center font-weight-500 mb-2">
                                                <span class="font-size-24 text-dark">{{ $book->price }} ₫</span>
                                            </div>
                                            <div class="mb-3 d-block">
                                                <span class="font-size-20 text-warning">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < floor($averageRating))
                                                            <i class="fa fa-star mr-1"></i>
                                                        @elseif ($i < ceil($averageRating))
                                                            <i class="fa fa-star-half-o mr-1"></i>
                                                        @else
                                                            <i class="fa fa-star-o mr-1"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                                <span>({{ round($averageRating, 1) }} / 5)</span>
                                            </div>
                                            <span class="text-dark mb-4 pb-4 iq-border-bottom d-block">{!! $book->description !!}</span>
                                            <div class="mb-4 d-flex align-items-center">
                                                <a style="color: #f1f1f1"
                                                    class="add-to-cart btn btn-primary view-more mr-2"
                                                    data-book-id="{{ $book->id }}">Thêm vào giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                    <div
                                        class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                                        <div class="iq-header-title">
                                            <h4 class="card-title mb-0">Sản phẩm tương tự</h4>
                                        </div>
                                    </div>
                                    <div class="iq-card-body single-similar-contens">
                                        <ul id="single-similar-slider" class="list-inline p-0 mb-0 row">
                                            @foreach ($relatedBooks as $relatedBook)
                                                <li class="col-md-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-5">
                                                            <div class="position-relative image-overlap-shadow">
                                                                <a
                                                                    href="{{ route('books.showUser', $relatedBook->id) }}"><img
                                                                        class="img-fluid rounded w-100"
                                                                        src="{{ asset('images/' . $relatedBook->photo) }}"
                                                                        alt=""></a>
                                                                <div class="view-book">
                                                                    <a href="{{ route('books.showUser', $relatedBook->id) }}"
                                                                        class="btn btn-sm btn-white">Xem thêm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-7 pl-0">
                                                            <h6 class="mb-2">{{ $relatedBook->name }}</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Bình luận -->
                            <section>
                                <div class="container-fluid py-5 mx-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-7 col-lg-8 col-md-10 col-12 text-center mb-5">
                                            <h1 style="text-decoration: underline;"> COMMENT </h1>
                                            <div id="comment-list" style="height: 500px; overflow-y: auto;">
                                                <!-- Load danh sach comment AJAX -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="comment-box ml-2">
                                                <form id="commentForm">
                                                    @csrf
                                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                    <h4>Add a comment</h4>
                                                    <div class="rating" required>
                                                        <input type="radio" name="rate" value="5" id="5"><label for="5">☆</label>
                                                        <input type="radio" name="rate" value="4" id="4"><label for="4">☆</label>
                                                        <input type="radio" name="rate" value="3" id="3"><label for="3">☆</label>
                                                        <input type="radio" name="rate" value="2" id="2"><label for="2">☆</label>
                                                        <input type="radio" name="rate" value="1" id="1"><label for="1">☆</label>
                                                    </div>
                                                    <div class="comment-area">
                                                        <textarea class="form-control" name="content" placeholder="What is your view?" rows="4" required></textarea>
                                                    </div>
                                                    <div class="comment-btns mt-2">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="pull-left">
                                                                    <button type="button" class="btn btn-success send btn-sm" id="submitComment">Send <i class="fa fa-long-arrow-right ml-1"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
        var userId = {{ auth()->check() ? auth()->id() : 'null' }};
        var avatarUrl = "{{ asset('default-avatar.jpg') }}";


        $(document).ready(function() {
            function loadComments() {
                $.ajax({
                    url: '{{ route('comments.list', $book->id) }}',
                    method: 'GET',
                    success: function(data) {
                        $('#comment-list').empty();
                        data.forEach(comment => {
                            let formattedDate = new Date(comment.created_at).toLocaleString();
                            let avatar = comment.photo ? "{{ asset('images/') }}/" + comment.photo : avatarUrl;
                            let commentHtml = `
                                <div class="card mb-3" id="comment-${comment.id}">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img style="width: 120px;height: 120px;" src="${avatar}" alt="User Avatar" class="img-fluid rounded-circle">
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card-body">
                                                <h5 class="card-title">${comment.username}</h5>
                                                <div class="ratings mb-2">
                                                    ${[...Array(5)].map((_, i) => i < comment.rate ? `<span class="fa fa-star star-active"></span>` : `<span class="fa fa-star star-inactive"></span>`).join('')}
                                                </div>
                                                <p class="card-text">${comment.content}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="card-text"><small class="text-muted">Posted: ${formattedDate}</small></p>
                                            ${isAuthenticated && comment.account_id == userId ? `<button class="btn btn-danger btn-sm delete-comment" data-id="${comment.id}">Delete</button>` : ''}
                                        </div>
                                    </div>
                                </div>
                            `;
                            $('#comment-list').append(commentHtml);
                        });

                        // Hàm xóa
                        $('.delete-comment').click(function() {
                            let commentId = $(this).data('id');
                            deleteComment(commentId);
                        });
                    },
                    error: function(xhr) {
                        console.error('Failed to load comments:', xhr);
                    }
                });
            }

            function deleteComment(commentId) {
                if (confirm('Are you sure you want to delete this comment?')) {
                    $.ajax({
                        url: '{{ route('comments.destroy', '') }}/' + commentId,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function() {
                            $('#comment-' + commentId).remove();
                            alert('Comment deleted successfully');
                        },
                        error: function(xhr) {
                            console.error('Failed to delete comment:', xhr);
                        }
                    });
                }
            }

            loadComments();

            $('#submitComment').click(function() {
                if (!isAuthenticated) {
                    alert('Please log in to add a comment.');
                    window.location.href = '{{ route('login') }}';
                    return;
                }
                let formData = $('#commentForm').serialize();
                $.ajax({
                    url: '{{ route('comments.storeAjax', $book->id) }}',
                    method: 'POST',
                    data: formData,
                    success: function(data) {
                        loadComments();
                        $('#commentForm')[0].reset();
                        alert('Your comment has been successfully added.');
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        for (let key in errors) {
                            alert(errors[key]);
                        }
                    }
                });
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
                            alert('There was an error adding the book to the cart: ' + response.message);
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

            // Use event delegation to handle dynamically added .add-to-cart buttons
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
    </script>
</x-new-layout>
