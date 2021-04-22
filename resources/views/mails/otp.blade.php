@php
use App\Models\User;
@endphp

<div style="font-family: Helvetica,Arial,sans-serif;width:100%;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:70%;padding:20px 0">
        <div style="border-bottom:1px solid #eee">
            <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Mobile Load</a>
        </div>


        <p style="font-size:1.1em">Hi, {{ User::find($otp->user_id)->name }}</p>
        <p>Probably you requested to change or recover you password. Use the following OTP to complete the process.
            OTP is valid for 5 minutes</p>
        <h2
            style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
            {{ $otp->otp }}</h2>
        <p style="font-size:0.9em;">Regards,<br />Mobile Load</p>
        <hr style="border:none;border-top:1px solid #eee" />

    </div>
</div>
