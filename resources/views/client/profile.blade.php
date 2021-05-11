@extends('client.layouts.app')

@section('title', 'Client profile')

@section('breadcrumb')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Profile</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="">Home</a></li>
                        <li><span>Profile</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page title area end -->
@endsection


@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-6 col-12">

                <div class="form-group row">

                    <label for="staticEmail" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        @php
                            use Illuminate\Support\Facades\Storage;
                        @endphp
                        <img src="{{ Storage::url($user->profile->photo) }}" width="150px" height="160px" /></br>
                        <form method="post" action="{{ route('changePhoto') }}" enctype="multipart/form-data">
                            @csrf
                            <input class="my-1" type="file" accept="image/*" name="photo" required />

                            <input type="submit" value="Change" class="btn btn-primary btn-sm" />
                        </form>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="userName" disabled
                            value="{{ $user->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="userEmail"
                            value="{{ $user->email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Balance</label>
                    <div class="col-sm-10 d-flex">
                        <p class="text-info pr-5 pl-0 py-2">৳ {{ $user->profile->balance }} Tk</p>
                        <form id="clientRecharge" method="post" action="{{ route('clientRecharge') }}">
                            @csrf
                            <input id="topUpAmount" type="number" min="10" max="20000" name="amount" hidden />
                            <button type="button" class="btn btn-sm btn-info" id="topUp" role="button">Topup</button>
                        </form>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">SMS</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="userEmail"
                            value="{{ $user->profile->sms }}">
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#topUp').click(function() {
                if ($("#topUp").attr("role") == "button") {
                    $('#topUpAmount').attr('hidden', false);
                    $('#topUp').attr('role', 'link');
                } else {
                    $('#clientRecharge').submit();
                }
            })
        })

    </script>
@endpush
