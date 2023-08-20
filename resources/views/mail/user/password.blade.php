<x-mail::message>
# Introduction

ваш пароль: {{ $pass }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
