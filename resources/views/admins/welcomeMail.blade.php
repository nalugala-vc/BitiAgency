@component('mail::message')
# Welcome to Biti Agency! 🎉

Dear {{ $name }}

Thank you for choosing Biti Agency as your trusted Life insurance Company.Your Username is {{ $email }} and your Password is {{ $password }}
Kindly user the above credentials to log into our official website. 

@component('mail::button', ['url' => ''])
Biti Agency
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
