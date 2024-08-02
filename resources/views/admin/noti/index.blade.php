<x-new-layout>
    <x-slot:title>
        Quản Lý Người Dùng
    </x-slot:title>
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Quản Lý Người Dùng</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.sendNotification') }}" method="POST">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td><input type="checkbox" name="user_ids[]" value="{{ $user->id }}"></td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <label for="title">Tiêu đề:</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Tin nhắn:</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi Thông Báo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = event.target.checked;
            }
        });
    </script>
</x-new-layout>
