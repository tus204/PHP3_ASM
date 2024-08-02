<x-new-layout>
    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                Thông tin cá nhân
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#change-password">
                                                Đổi mật khẩu
                                            </a>
                                        </li>
                                        @if (session('error'))
                                        <div class="error-message mb-4 font-medium text-sm text-green-600">{{ session('error') }}</div>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#change-password">
                                                Cập nhật Thành công
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Thông tin cá nhân</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form method="POST" action="{{ route('account.update' , ['user' => Auth::id()]) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                        <img class="profile-pic" style="width: 150px;height: 150px;" src="{{ $user->photo ? asset('images/' . $user->photo) : asset('images/avatar-facebook-mac-dinh-19.jpg') }}" alt="Không có ảnh">

                                                            <div class="p-image">
                                                                <i class="ri-pencil-line upload-button"></i>
                                                                <input class="file-upload" type="file" name="photo">
                                                                @if ($errors->has('photo'))
                                                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6">
                                                        <label for="name">Họ tên:</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                                        @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="username">Tên tài khoản:</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}">
                                                        @if ($errors->has('username'))
                                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                                                        @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="phone">Số điện thoại</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                                        @if ($errors->has('phone'))
                                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="gender" class="d-block">Giới tính:</label>
                                                        <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender', $user->gender) }}">
                                                        @if ($errors->has('gender'))
                                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="dayOfBirth">Ngày sinh:</label>
                                                        <input class="form-control" id="dayOfBirth" name="dayOfBirth" value="{{ old('dayOfBirth', $user->dayOfBirth) }}">
                                                        @if ($errors->has('dayOfBirth'))
                                                        <span class="text-danger">{{ $errors->first('dayOfBirth') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="address">Địa chỉ</label>
                                                        <input class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
                                                        @if ($errors->has('address'))
                                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Gửi</button>
                                                <button type="reset" class="btn iq-bg-danger">Hủy bỏ</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="change-password" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Đổi mật khẩu</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form method="POST" action="{{ route('account.change_password', ['user' => Auth::id()]) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="current-password">Mật khẩu hiện tại:</label>
                                                    <input type="password" class="form-control" id="current-password" name="current_password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="new-password">Mật khẩu mới:</label>
                                                    <input type="password" class="form-control" id="new-password" name="new_password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm-password">Xác nhận mật khẩu mới:</label>
                                                    <input type="password" class="form-control" id="confirm-password" name="new_password_confirmation">
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Gửi</button>
                                                <button type="reset" class="btn iq-bg-danger">Hủy bỏ</button>
                                            </form>
                                        </div>
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