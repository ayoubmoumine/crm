@component('mail::message')
# Hello {{ $name }}

You have been invited to join your coworkers on CRM plateform.

Could you please register in order to have access using the link bellow.

@component('mail::button', ['url' => $link ])
Button Text
@endcomponent


Kindly,<br>
//TODO add the app name to env file
Team {{ env('APP_NAME') }}
@endcomponent
