<x-new-layout>
    <x-slot:title>
        Thông Báo
    </x-slot:title>
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Thông Báo</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <h5 class="mb-0 text-white">Thông Báo<small class="badge badge-light float-right pt-1">{{ $notifications->count() }}</small></h5>
                            <div class="notifications-list">
                                @foreach($notifications as $notification)
                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center">
                                            <div class="">
                                                <img class="avatar-40 rounded" src="{{ asset('images/user/default.jpg') }}" alt="">
                                            </div>
                                            <div class="media-body ml-3">
                                                <h6 class="mb-0">{{ $notification->data['title'] }}</h6>
                                                <small class="float-right font-size-12">{{ $notification->created_at->diffForHumans() }}</small>
                                                <p class="mb-0">{{ $notification->data['message'] }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-new-layout>
