<x-new-layout>
    <x-slot:title>
        Trang Sửa thông tin người dùng
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
                                    <h4 class="card-title">Sửa thông tin người dùng</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="name">Tên người dùng:</label>
                                        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ $user->name }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="{{ $user->email }}">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Ảnh người dùng:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="photo" onchange="previewImage(event)">
                                            <label class="custom-file-label" for="photo">Chọn file</label>
                                            @error('photo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img id="image-preview" src="{{ asset('images/' . $user->photo) }}" alt="Image Preview" style="max-width: 100px; margin-top: 10px;">
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

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-new-layout>
