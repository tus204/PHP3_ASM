<x-new-layout>
    <x-slot:title>
        Trang Sửa
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
                                    <h4 class="card-title">Sửa sách</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label for="name">Tên sách:</label>
                                        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ $book->name }}">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục sách:</label>
                                        @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]" id="cate-{{ $category->id }}" {{ $book->categories->contains($category->id) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="cate-{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                        @endforeach
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh:</label>
                                        <img id="image-preview" src="{{ asset('images/' . $book->photo) }}" alt="Image Preview" style="max-width: 100px; margin-bottom: 10px;">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="photo" onchange="previewImage(event)">
                                            <label class="custom-file-label" for="photo">Choose file (optional)</label>
                                            @error('photo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sách:</label>
                                        <input type="text" class="form-control" id="price" aria-describedby="price" name="price" value="{{ $book->price }}">
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng sách:</label>
                                        <input type="text" class="form-control" id="totalBook" aria-describedby="totalBook" name="totalBook" value="{{ $book->totalBook }}">
                                        @error('totalBook')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung:</label>
                                        <textarea class="form-control" rows="4" id="description" aria-describedby="description" name="description">{{ $book->description }}</textarea>
                                        <small id="word-count" class="form-text text-muted">Word count: 0</small>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="reset" class="btn btn-danger">Trở lại</button>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    
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
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
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

        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    countWords(editor.getData());
                });
                countWords(editor.getData()); 
            })
            .catch(error => {
                console.error(error);
            });

        function countWords(text) {
            var tempElement = document.createElement('div');
            tempElement.innerHTML = text;
            var textContent = tempElement.textContent || tempElement.innerText || "";
            var wordCount = textContent.trim().split(/\s+/).length;
            document.getElementById('word-count').innerText = 'Word count: ' + wordCount;
        }
    </script>
</x-new-layout>
