<x-new-layout>
    <x-slot:title>
        Danh Sách Đơn Hàng Của Tôi
    </x-slot:title>
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Danh Sách Đơn Hàng</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="mb-3 text-right">
                                <a href="{{ route('home') }}" class="btn btn-secondary">Quay lại trang chủ</a>
                            </div>
                            @if ($orders->isEmpty())
                                <p>Bạn chưa có đơn hàng nào.</p>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Đơn Hàng Mới</th>
                                            <th>Ngày Đặt</th>
                                            <th>Tổng Tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $index => $order)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                <td>{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                                                <td>{{ ucfirst($order->status) }}</td>
                                                <td>
                                                    <a href="{{ route('orders.show', $order->id) }}"
                                                        class="btn btn-primary btn-sm">Xem</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-new-layout>
