<x-mail::message>
{{-- Lời chào --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Có lỗi xảy ra!')
@else
# @lang('Chào bạn!')
@endif
@endif

{{-- Dòng giới thiệu --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Nút hành động --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

{{-- Dòng kết thúc --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Lời chào cuối --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Trân trọng'),<br>
{{ config('app.name') }}
@endif

{{-- Phần phụ --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "Nếu bạn gặp khó khăn khi nhấp vào nút \":actionText\", hãy sao chép và dán URL bên dưới\n".
    'vào trình duyệt của bạn:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>