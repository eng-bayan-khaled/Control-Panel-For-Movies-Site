@component('mail::message')
# Reset Password Request

Welcome {{ $option['data']->name }}
<div style="display:block">
Click on the button to reset your password
</div>

@component('mail::button', ['url' => url('control/recover_password/'.$option['token'])])
Reset Link
@endcomponent

Thanks,<br>

Support Team
@endcomponent
