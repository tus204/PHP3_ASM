<x-new-layout>
    <x-slot:title>
        Trang Index User
    </x-slot>

    @if($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif

    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <!-- loader END -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Danh sách Voucher</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <a href="{{ route('vouchers.create') }}" class="btn btn-primary">Thêm voucher</a>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="data-tables table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 3%;">STT</th>
                                                <th style="width: 15%;">Tên Voucher</th>
                                                <th style="width: 15%;">Code</th>
                                                <th style="width: 10%;">Tổng số</th>
                                                <th style="width: 10%;">Giá Trị</th>
                                                <th style="width: 15%;">Ngày hết hạn</th>
                                                <th style="width: 15%">Hoạt động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vouchers as $voucher)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $voucher->name }}</td>
                                                <td>{{ $voucher->code }}</td>
                                                <td>{{ $voucher->total }}</td>
                                                <td>{{ $voucher->value }}</td>
                                                <td>{{ $voucher->expired_at }}</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a style="width: 30px;height: 30px;margin-right: 3px;margin-left: 3px;" class="bg-primary" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('vouchers.edit', $voucher->id) }}"><i class="ri-pencil-line"></i></a>
                                                        <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa voucher này?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="width: 30px;" type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="ri-delete-bin-line"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->

   
</x-new-layout>
