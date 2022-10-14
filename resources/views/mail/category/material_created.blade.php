@component('mail::message')
Появился новый материал с категорией {{ $material->category->name }}

@component('mail::button', ['url' => route('material.show', $material->slug)])
Смотреть
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
