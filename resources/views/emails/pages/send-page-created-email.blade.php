@component('mail::message')
# Introduction
### New page create with title of ({{$page->title}})

@component('mail::button', ['url' => ''])
View Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
