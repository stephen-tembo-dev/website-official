@php
    if (!isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet =
        $scrollTo !== false
            ? <<<JS
                   (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}'))
            .scrollIntoView()
            JS
            : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><a href="#"><i class="material-icons">chevron_left</i></a></li>
            @else
                <li class="waves-effect">
                    <a href="#paginated" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                        <i class="material-icons">chevron_left</i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="{{ $page == $paginator->currentPage() ? 'active active-pagination-link' : 'waves-effect' }} ">
                            <a href="#paginated"
                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="waves-effect">
                    <a href="#paginated" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
            @else
                <li class="disabled"><a href="#"><i class="material-icons">chevron_right</i></a></li>
            @endif
        </ul>
    @endif
</div>
