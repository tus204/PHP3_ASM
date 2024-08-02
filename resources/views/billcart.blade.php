<x-new-layout>
    <x-slot:title>
        Trang Đặt Hàng
    </x-slot:title>
    <div id="content-page" class="content-page">
        <div class="container-fluid checkout-content">
            <div class="row">
                <div id="cart" class="card-block show p-0 col-12">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="iq-card" style="max-width: 1000px;min-height: 534px;">
                                <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Giỏ hàng</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <form action="{{ route('store_cart_temp') }}" method="POST">
                                        @csrf
                                        <ul class="list-inline p-0 m-0">
                                            @foreach($cartItems as $item)
                                                <li class="checkout-product" data-id="{{ $item->id }}">
                                                    <input type="hidden" name="cartItems[{{ $loop->index }}][id]" value="{{ $item->id }}">
                                                    <input type="hidden" name="cartItems[{{ $loop->index }}][quantity]" value="{{ $item->quantity }}">
                                                    <div class="row align-items-center">
                                                        <div class="col-sm-2">
                                                            <span class="checkout-product-img">
                                                                <a href="javascript:void(0);">
                                                                    <img class="img-fluid rounded" src="{{ asset('images/' . $item->book->photo) }}" alt="{{ $item->book->name }}">
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="checkout-product-details">
                                                                <h5 class="text-truncate" title="{{ $item->book->name }}">{{ Str::limit($item->book->name, 30) }}</h5>
                                                                <p class="text-success">Còn hàng</p>
                                                                <h5>{{ number_format($item->book->price, 0, ',', '.') }}đ</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <div class="row align-items-center mt-2">
                                                                        <div class="col-sm-7 col-md-6">
                                                                            <button type="button" class="fa fa-minus qty-btn" id="btn-minus"></button>
                                                                            <input type="text" class="quantity form-control form-control-sm text-center" value="{{ $item->quantity }}">
                                                                            <button type="button" class="fa fa-plus qty-btn" id="btn-plus"></button>
                                                                        </div>
                                                                        <div class="col-sm-5 col-md-6">
                                                                            <span class="product-price">{{ number_format($item->quantity * $item->book->price, 0, ',', '.') }}đ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <a href="javascript:void(0);" class="text-dark font-size-20 delete-product"><i class="ri-delete-bin-7-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div style="position: absolute;top: 80%;left: 50%" style="padding-left: 21px;" class="pagination justify-content-center mt-4">
                                            {{ $cartItems->links() }}
                                        </div>
                                        <button style="position: absolute; top: 81%;" type="submit" class="btn btn-primary d-block mt-3">Đặt hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <p>Tùy chọn</p>
                                    <div class="d-flex justify-content-between">
                                        <form id="apply-coupon-form" class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <span>Mã giảm giá: </span>
                                                <div class="cvv-input ml-3 mr-3">
                                                    <input type="text" id="coupon-code" class="form-control" placeholder="Nhập mã giảm giá">
                                                </div>
                                                <button type="submit" class="btn btn-primary" id="apply-coupon-btn">Áp dụng</button>
                                            </div>
                                        </form>
                                    </div>
                                    <button id="clear-coupon" class="btn btn-danger mt-3">Xóa mã giảm giá</button>
                                    <hr>
                                    <p><b>Chi tiết</b></p>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Tổng</span>
                                        <span id="total-price" data-total="{{ $totalPrice }}">{{ number_format($totalPrice, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Giảm giá</span>
                                        <span id="discount-price" class="text-success">0đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>Thuế VAT (5% tổng sản phẩm)</span>
                                        <span id="vat-price">{{ number_format($totalPrice * 0.05, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Phí vận chuyển</span>
                                        <span class="text-success">Miễn phí</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-dark"><strong>Tổng</strong></span>
                                        <span class="text-dark"><strong id="final-total">{{ number_format($totalPrice + ($totalPrice * 0.05), 0, ',', '.') }}đ</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-new-layout>




 {{-- Đoạn Chat --}}
 <script>
    window.__lc = window.__lc || {};
    window.__lc.license = 18104544;
    window.__lc.integration_name = "manual_onboarding";
    window.__lc.product_name = "livechat";
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/18104544/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
{{-- Chat End --}}
<style>
    .checkout-product-img img {
        max-width: 100%;
        max-height: 100%;
    }

    .checkout-product-details h5 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .qty-btn {
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ddd;
        background: #fff;
        cursor: pointer;
    }

    .form-control-sm {
        width: 50px;
        display: inline-block;
    }

    .product-price {
        font-weight: bold;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    //Tong tien ban dau
    var initialTotalPrice = parseInt($('#total-price').data('total'), 10);

    // Hàm xử lý nút tăng/giảm số lượng
    $('.qty-btn').on('click', function() {
        var $button = $(this);
        //Lấy input số lượng
        var $input = $button.siblings('.quantity');
        //Chuyển thành số nguyên
        var oldValue = parseInt($input.val(), 10);
        var newVal;

        if ($button.hasClass('fa-plus')) {
            newVal = oldValue + 1;
        } else {
            newVal = oldValue > 1 ? oldValue - 1 : 1;
        }
        //gan so luong mới
        $input.val(newVal);

        var cartItemId = $button.closest('.checkout-product').data('id');

        //  AJAX cập nhật số lượng giỏ hàng
        $.ajax({
            url: "{{ route('update_cart_quantity') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: cartItemId,
                quantity: newVal
            },
            success: function(response) {
                if (response.success) {
                    $button.closest('.checkout-product').find('.product-price').text(formatCurrency(response.newPrice) + 'đ');
                    initialTotalPrice = response.totalPrice; 
                    updateTotalPrice(response.totalPrice, $('#discount-price').data('discount') || 0);
                }
            }
        });
    });

    // Hàm xử lý xóa sản phẩm
    $('.delete-product').on('click', function() {
        var $button = $(this);
        var cartItemId = $button.closest('.checkout-product').data('id');

        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
            // AJAX xóa sản phẩm khỏi giỏ hàng
            $.ajax({
                url: "{{ route('delete_cart_item') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: cartItemId
                },
                success: function(response) {
                    if (response.success) {
                        $button.closest('.checkout-product').remove();
                        // Cập nhật totalPrice dựa trên dữ liệu từ server
                        initialTotalPrice = response.totalPrice; 
                        updateTotalPrice(response.totalPrice, $('#discount-price').data('discount') || 0);
                    }
                }
            });
        }
    });
    // Handle apply coupon
    $('#apply-coupon-form').on('submit', function(event) {
        event.preventDefault();
        var couponCode = $('#coupon-code').val().trim();

        if (couponCode === '') {
            alert('Vui lòng nhập mã giảm giá.');
            return;
        }

        $.ajax({
            url: "{{ route('apply_coupon') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                coupon_code: couponCode
            },
            success: function(response) {
                if (response.success) {
                    var discountValue = parseInt(response.discount, 10);
                    $('#discount-price').text(formatCurrency(discountValue) + 'đ').data('discount', discountValue);
                    updateTotalPrice(initialTotalPrice, discountValue);

                    // Them trong session
                    $.ajax({
                        url: "{{ route('store_discount') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            discount: discountValue
                        }
                    });
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });

    // Ham Clear MA GIam Gia
    $('#clear-coupon').on('click', function(event) {
        event.preventDefault();
        $('#discount-price').text('0đ').data('discount', 0);
        $('#coupon-code').val('');
        updateTotalPrice(initialTotalPrice, 0);

        // XOa ben session
        $.ajax({
            url: "{{ route('clear_discount') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    location.reload();  
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Đã có lỗi xảy ra. Vui lòng thử lại sau.');
            }
        });
    });

    function updateTotalPrice(totalPrice, discount = 0) {
        totalPrice = parseInt(totalPrice, 10) || 0;
        discount = parseInt(discount, 10) || 0;

        var vat = Math.round(totalPrice * 0.05);
        var finalTotal = Math.round(totalPrice - discount + vat);

        $('#total-price').text(formatCurrency(totalPrice) + 'đ').data('total', totalPrice);
        $('#vat-price').text(formatCurrency(vat) + 'đ');
        $('#final-total').text(formatCurrency(finalTotal) + 'đ');
    }

    // Format dinh dang
    function formatCurrency(value) {
        value = Math.round(value);
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
});

</script>