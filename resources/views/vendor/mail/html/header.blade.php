@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel' || trim($slot) === config('app.name'))
<img src="{{ config('app.url') }}/images/logo-with-wordmark.svg" class="logo" alt="openSUSE Lounge Logo" style="filter: brightness(0) invert(1);">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
