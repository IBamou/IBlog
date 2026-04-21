@props([
    'paginator' => null
])

@if($paginator && $paginator->hasPages())
<div class="join mx-auto">
    @if($paginator->onFirstPage())
    <button class="join-item btn btn-sm" disabled>&lsaquo;</button>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn btn-sm">&lsaquo;</a>
    @endif

    @php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
    $start = max(1, $current - 2);
    $end = min($last, $current + 2);
    @endphp

    @for($i = $start; $i <= $end; $i++)
        @if($i == $current)
        <button class="join-item btn btn-sm btn-primary">{{ $i }}</button>
        @else
        <a href="{{ $paginator->url($i) }}" class="join-item btn btn-sm">{{ $i }}</a>
        @endif
    @endfor

    @if($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn btn-sm">&rsaquo;</a>
    @else
    <button class="join-item btn btn-sm" disabled>&rsaquo;</button>
    @endif
</div>
@endif