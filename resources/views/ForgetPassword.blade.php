<x-mail::message>
# {{$maildata['title']}}

To proceed to reset password click the button bellow
<x-mail::button :url="'http://127.0.0.1:8000/'">
Proceed to change password
</x-mail::button>

</x-mail::message>
