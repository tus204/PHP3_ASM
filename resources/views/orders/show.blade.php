<x-new-layout>
    <x-slot:title>
        Chi Tiết Đơn Hàng
    </x-slot:title>
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Thông Tin Đơn Hàng #{{ $order->id }}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <p><strong>Họ và tên:</strong> {{ $order->name }}</p>
                            <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                            <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }}đ</p>
                            <p><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</p>
                            @if ($order->status == 'confirmed' && $order->payment_confirmed == 'none')
                                <form action="{{ route('vnpay_payment') }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="submit" class="btn btn-success">Thanh Toán VNPay</button>
                                </form>
                                <form action="{{ route('cash_payment') }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <button type="submit" class="btn btn-primary">Thanh Toán Tiền Mặt</button>
                                </form>
                            @endif
                            @if ($order->status == 'shipped')
                                <form action="{{ route('orders.complete', $order->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Hoàn Thành</button>
                                </form>
                                {{-- <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Hủy</button>
                                </form> --}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Danh Sách Mặt Hàng</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <ul class="list-group">
                                @foreach ($orderItems as $item)
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="{{ asset('images/' . $item->book->photo) }}" alt="{{ $item->book->name }}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                        <div>
                                            <p class="mb-0">{{ $item->book->name }}</p>
                                            <small>Số lượng: {{ $item->quantity }} - Giá: {{ number_format($item->price, 0, ',', '.') }}đ</small>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-right">
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>

                  
                </div>
            </div>
        </div>
    </div>
</x-new-layout>

<style>
    .list-group-item {
        display: flex;
        align-items: center;
    }

    .list-group-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 10px;
    }

    .list-group-item div {
        flex-grow: 1;
    }

    .text-right {
        text-align: right;
    }
</style>

