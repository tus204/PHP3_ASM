<x-new-layout>
    <x-slot:title>
       Trang thể loại:  {{$category->name }}
    </x-slot>
    <!-- Wrapper Start -->
    <div class="wrapper">
       <!-- Page Content  -->
       <div id="content-page" class="content-page">
          <div class="container-fluid">
             <!-- Search Results Section -->
             <div class="row mt-4">
                <div class="col-lg-12">
                   <h5 class="mb-3">{{$category->name }}</h5>
                   <div class="iq-card">
                      <div class="iq-card-body">
                        <div class="row">
                            @if ($books->isEmpty())
                                <div class="col-12">
                                    <div class="alert alert-info text-center" role="alert">
                                        Thư mục này không có sách.
                                    </div>
                                </div>
                            @else
                                @foreach ($books as $book)
                                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                            <div class="iq-card-body p-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                        <a href="{{ route('books.showUser', $book->id) }}">
                                                            <img class="img-fluid rounded w-100" src="{{ asset('images/' . $book->photo) }}" alt="{{ $book->name }}">
                                                        </a>
                                                        <div class="view-book">
                                                            <a href="{{ route('books.showUser', $book->id) }}" class="btn btn-sm btn-white">View Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-2">
                                                            <h6 class="mb-1">{{ $book->name }}</h6>
                                                        </div>
                                                        <div class="price d-flex align-items-center">
                                                            <h6><b>{{ number_format($book->price, 0, ',', '.') }} đồng</b></h6>
                                                        </div>
                                                        <div class="iq-product-action">
                                                            <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                                            <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                         {{ $books->links() }}
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </x-new-layout>
 