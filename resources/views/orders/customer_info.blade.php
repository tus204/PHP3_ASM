<x-new-layout>
    <x-slot:title>
        Thông Tin Khách Hàng
    </x-slot:title>
    <div id="content-page" class="content-page">
        <div class="container-fluid checkout-content">
            <div class="row">
                <div class="col-lg-8">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Thêm địa chỉ mới</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form action="{{ route('orders.place') }}" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Họ và tên: *</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số điện thoại: *</label>
                                            <input type="text" class="form-control" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Địa chỉ: *</label>
                                            <input type="text" class="form-control" id="address-input" name="address" required>
                                            <div id="map" style="width: 100%; height: 300px; margin-top: 10px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <input type="hidden" name="discount" value="{{ $discount }}">
                                        <button id="savenddeliver" type="submit" class="btn btn-primary">Lưu và giao tại đây</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <h4 class="mb-2">Tóm tắt đơn hàng</h4>
                            <div class="shipping-address scrollable">
                                @foreach($cartItems as $item)
                                    <div class="item d-flex align-items-center mb-2">
                                        <img src="{{ asset('images/' . $item->book->photo) }}" alt="{{ $item->book->name }}" class="item-image" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                        <p class="mb-0">{{ $item->book->name }} x{{ $item->quantity }} - {{ number_format($item->quantity * $item->book->price, 0, ',', '.') }}đ</p>
                                    </div>
                                @endforeach
                                <hr>
                            </div>
                            <hr>
                            <p class="mb-0"><strong>Tổng:</strong> {{ number_format($totalPrice, 0, ',', '.') }}đ</p>
                            <p class="mb-0"><strong>Giảm giá:</strong> {{ number_format($discount, 0, ',', '.') }}đ</p>
                            <p class="mb-0"><strong>Thuế VAT (5%):</strong> {{ number_format($vat, 0, ',', '.') }}đ</p>
                            <p class="mb-0"><strong>Tổng cộng:</strong> {{ number_format($finalTotal, 0, ',', '.') }}đ</p>
                            <hr>
                            <a href="{{ route('cart.index') }}" class="btn btn-secondary d-block mt-1">Quay lại giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .scrollable {
            max-height: 300px;
            overflow-y: auto;
        }
        .scrollable .item {
            display: flex;
            align-items: center;
        }
        .item-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
        }
        #map {
            height: 300px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map
            var map = L.map('map').setView([21.0285, 105.8542], 13);

            // Set up OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Initialize marker
            var marker = L.marker([21.0285, 105.8542]).addTo(map);

            // Add geocoder control
            var geocoder = L.Control.geocoder({
                defaultMarkGeocode: false
            })
            .on('markgeocode', function(e) {
                var latlng = e.geocode.center;
                map.setView(latlng, map.getZoom());
                marker.setLatLng(latlng);
                var address = e.geocode.name;
                document.getElementById('address-input').value = address;
            })
            .addTo(map);

            // Geocode address on input change
            document.getElementById('address-input').addEventListener('change', function() {
                var address = this.value;
                geocoder.geocode(address, function(results) {
                    if (results.length > 0) {
                        var result = results[0];
                        var latlng = result.center;
                        map.setView(latlng, map.getZoom());
                        marker.setLatLng(latlng);
                        document.getElementById('address-input').value = result.name;
                    } else {
                        alert("Không tìm thấy địa chỉ.");
                    }
                });
            });

            // Update address on map click
            map.on('click', function(e) {
                var latlng = e.latlng;
                marker.setLatLng(latlng);

                fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latlng.lat}&lon=${latlng.lng}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('address-input').value = data.display_name;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    </script>
</x-new-layout>
