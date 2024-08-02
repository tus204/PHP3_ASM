<x-new-layout>
    <x-slot:title>
        Trang Sửa thông tin Voucher
    </x-slot:title>

    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Sửa thông tin Voucher</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('vouchers.update', $voucher->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="name">Tên Voucher</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $voucher->name }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Mã Voucher</label>
                                        <input type="text" class="form-control" id="code" name="code" value="{{ $voucher->code }}">
                                        @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Số lượng</label>
                                        <input type="number" class="form-control" id="total" name="total" value="{{ $voucher->total }}">
                                        @error('total')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="value">Giá trị</label>
                                        <input type="number" class="form-control" id="value" name="value" value="{{ $voucher->value }}">
                                        @error('value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group position-relative">
                                        <label for="expired_at">Ngày hết hạn</label>
                                        <input type="date" class="form-control" id="expired_at" name="expired_at" value="{{ $voucher->expired_at }}">
                                        <div class="date-overlay" onclick="document.getElementById('expired_at').focus();"></div>
                                        @error('expired_at')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <button type="reset" class="btn btn-danger">Trở lại</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("photo").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>

    <style>
        .form-group {
            position: relative;
        }
        .date-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            cursor: pointer;
            z-index: 1;
        }
        .form-group input[type="date"] {
            position: relative;
            z-index: 2;
        }
    </style>
</x-new-layout>
