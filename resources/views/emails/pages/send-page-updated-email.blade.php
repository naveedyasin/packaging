@component('mail::message')
# Introduction

### New page updated with title ({{$page->title}})

@component('mail::button', ['url' => ''])
View Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
