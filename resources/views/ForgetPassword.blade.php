<x-mail::message>
# {{$maildata['title']}}
@php
    $Email = $maildata['Email'];
    $url = "http://127.0.0.1:8000/RP/$Email";
@endphp
To proceed to reset password click the button bellow.
<x-mail::button :url="$url">
Proceed to change password
</x-mail::button>

</x-mail::message>
