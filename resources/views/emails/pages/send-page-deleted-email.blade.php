@component('mail::message')
# Introduction

### Page deleted with title ({{$page->title}})

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
