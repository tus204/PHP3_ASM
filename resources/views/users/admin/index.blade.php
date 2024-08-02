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
                                        <h4 class="card-title">Danh sách người dùng</h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <a style="    margin-right: 10px;" href="{{ route('users.create' )}}" class="btn btn-primary">Thêm Admin</a>
                                        <a href="{{ route('users.createUser' )}}" class="btn btn-primary">Thêm User</a>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="table-responsive">
                                        <table class="data-tables table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="width: 3%;">STT</th>
                                                    <th style="width: 5%;">Tên người dùng</th>
                                                    <th style="width: 10%;">Ảnh đại diện</th>
                                                    <th style="width: 10%">Email</th>
                                                    <th style="width: 3%">Role</th>
                                                    <th style="width: 5%">Trạng thái</th>
                                                    <th style="width: 5%">Hoạt động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        @if ($user->photo)
                                                        <img src="{{ asset('images/' . $user->photo) }}" alt="User Photo" style="max-width: 100px;">
                                                        @else

                                                        @endif
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        @if($user->ban)
                                                        <span class="badge badge-danger">Đã cấm</span>
                                                        @else
                                                        <span class="badge badge-success">Không bị cấm</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            @if($user->role=='admin')
                                                            <a class="bg-primary" style="width: 29px; height: 30px;" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('users.edit', $user->id) }}"><i class="ri-pencil-line"></i></a>
                                                            <form  action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button style="width: 30px;margin-right: 3px;margin-left: 3px;" type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="ri-delete-bin-line" aria-hidden="true"></i></button>
                                                            </form>
                                                            @else
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa người dùng này?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button style="width: 30px;margin-right: 3px;margin-left: 3px;" type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="ri-delete-bin-line"></i></button>
                                                            </form>
                                                            <!-- Nothing -->
                                                            @endif
                                                            <!-- Kiểm tra trạng thái của người dùng và hiển thị biểu tượng tương ứng -->
                                                            @if($user->role=='admin')
                                                            <!-- Nothing -->
                                                            @else
                                                            @if($user->ban)
                                                            <!-- Nếu người dùng đã bị ban -->
                                                            <form action="{{ route('users.unban', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn hủy ban người dùng này?')">
                                                                @csrf
                                                                <button style="width: 30px;margin-right: 3px;margin-left: 3px;" type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Hủy ban"><i class="fa fa-unlock" aria-hidden="true"></i></button>
                                                            </form>
                                                            @else
                                                            <!-- Nếu người dùng không bị ban -->
                                                            <form action="{{ route('users.ban', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn ban người dùng này?')">
                                                                @csrf
                                                                <button style="width: 30px;margin-right: 3px;margin-left: 3px;" type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ban"><i class="ri-lock-line"></i></button>
                                                            </form>
                                                            @endif
                                                            @endif
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