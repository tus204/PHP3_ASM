<x-new-layout>
    <x-slot:title>
        Trang Sửa thông tin danh mục
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
                                    <h4 class="card-title">Sửa danh mục</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('categories.update', $category->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="name">Tên sách:</label>
                                        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ $category->name }}">
                                        @error('name')
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
</x-new-layout>
