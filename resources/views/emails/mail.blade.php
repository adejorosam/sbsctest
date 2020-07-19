@component('mail::message')
# Introduction

Thank you for registering on our app.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
