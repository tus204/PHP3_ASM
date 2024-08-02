<x-new-layout>
<x-slot:title>
        Trang Admin Index
    </x-slot>
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
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
                                        <h4 class="card-title">Danh sách sách</h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <a href="{{route('books.create')}}" class="btn btn-primary">Thêm sách</a>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="table-responsive">
                                        <table class="data-tables table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="width: 3%;">STT</th>
                                                    <th style="width: 12%;">Hình ảnh</th>
                                                    <th style="width: 15%;">Tên sách</th>
                                                    <th style="width: 15%;">Thể loại sách</th>
                                                    <th style="width: 15%;">Mô tả sách</th>
                                                    <th style="width: 18%;">Giá</th>
                                                    <th style="width: 7%;">Hoạt động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($books as $book)
                                                <tr>
                                                    <td>{{ $book->id }}</td>
                                                    <td><img class="img-fluid rounded" src="{{ asset('images/' . $book->photo) }}" alt=""></td>
                                                    <td>{{ $book->name }}</td>
                                                    <td>
                                                        @foreach($book->categories as $category)
                                                        <span class="badge badge-primary">{{ $category->name }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <p class="mb-0">{!! $book->description !!}</p>
                                                    </td>
                                                    <td>{{ $book->price }} Đồng</td>
                                                    <td>
                                                        <div class="flex align-items-center list-user-action">
                                                            <a  class="bg-primary" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('books.edit', $book->id)}}"><i  class="ri-pencil-line"></i></a>
                                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa sách này?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="ri-delete-bin-line"></i></button>
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