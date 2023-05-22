<x-layout>

    <h1>{{ \App\Models\TextWidget::getTitle('about') }}</h1>
    <div>

        {!! \App\Models\TextWidget::getContent('about') !!}
    </div>
</x-layout>
