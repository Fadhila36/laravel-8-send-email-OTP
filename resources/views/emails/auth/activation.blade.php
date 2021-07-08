@component('mail::message')
# Activation Email

Hi {{ $user->name }}

Berikut Kode Verifikasi OTP Anda <b>{{ $user->token_activation }}</b>
<br>
Silahkan masukkan Kode OTP tersebut untuk aktifasi 
akun anda.

{{-- @component('mail::button', ['url' => ''])
    Activation  
@endcomponent --}}

Thanks,<br>
Unifisyt
@endcomponent
