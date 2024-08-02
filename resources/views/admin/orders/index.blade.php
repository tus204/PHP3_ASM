<x-new-layout>
    <x-slot:title>
        Quản Lý Đơn Hàng
    </x-slot:title>
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Quản Lý Đơn Hàng</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if($orders->isEmpty())
                                <p>Không có đơn hàng nào.</p>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Đơn Hàng Mới</th>
                                            <th>Khách Hàng</th>
                                            <th>Ngày Đặt</th>
                                            <th>Tổng Tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $index => $order)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                <td>{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                                                <td>{{ ucfirst($order->status) }}</td>
                                                <td>
                                                    @if($order->status == 'pending')
                                                        <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm">Xác Nhận</button>
                                                        </form>
                                                        <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Hủy</button>
                                                        </form>
                                                    @else
                                                        <span>{{ ucfirst($order->status) }}</span>
                                                    @endif
                                                    @if($order->status == 'paid')
                                                    <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ship"><i class="ri-truck-line"></i></button>
                                                    </form>
                                                @endif
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
