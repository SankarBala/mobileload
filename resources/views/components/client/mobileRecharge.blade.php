@section('content')
<div class="col-lg-4 mb-4 mb-lg-0">
    <h2 class="text-4 mb-3">Mobile Recharge or Bill Payment</h2>
    <form id="recharge-bill" method="post" action="{{ route('recharge') }}">

        @csrf
        <div class="mb-3">
            <div class="custom-control custom-radio custom-control-inline">
                <input id="prepaid" name="accountType" class="custom-control-input" checked="" required
                    type="radio" value="Prepaid">
                <label class="custom-control-label" for="prepaid">Prepaid</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="postpaid" name="accountType" class="custom-control-input" required
                    type="radio" value="Postpaid">
                <label class="custom-control-label" for="postpaid">Postpaid</label>
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" data-bv-field="number" id="mobileNumber" required
                placeholder="Enter Mobile Number" name="mobileNumber">
            @error('mobileNumber')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <select class="custom-select" id="operator" required="" name="operator">
                <option>Select Your Operator</option>
                <option value="GP">Grameenphone</option>
                <option value="BL">Banglalink</option>
                <option value="AT">Airtel</option>
                <option value="RB">Robi</option>
                <option value="TT">Teletalk</option>
                <option value="GP ST">Skitto (GP)</option>
            </select>
            @error('operator')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend"> <span class="input-group-text">&nbsp; ৳
                    &nbsp;</span> </div>
            <a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View
                Plans</a>
            <input class="form-control" id="amount" placeholder="Enter Amount" required type="number"
                name="amount" />
            </div>
            @error('amount')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        <button class="btn btn-primary btn-block" type="submit">Continue to
            Recharge</button>

    </form>
</div>
@endsection