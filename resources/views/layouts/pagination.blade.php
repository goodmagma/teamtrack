@php
    $livewire = $livewire ?? false;
@endphp

@if ($paginator->hasPages())
    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-muted">Showing <span>{{ $paginator->firstItem() }}</span> to <span>{{ $paginator->lastItem() }}</span> of <span>{{ $paginator->total() }}</span> entries</p>

        <ul class="pagination m-0 ms-auto">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" @if ($livewire) wire:key="{{ $paginator->getPageName() . '-' . 'prev-disabled' }}" @endif>
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                        prev
                    </a>
                </li>
            @else
                <li class="page-item" @if ($livewire) wire:key="{{ $paginator->getPageName() . '-' . 'prev' }}" @endif>
                    <a class="page-link" @if ($livewire) wire:click.prevent="previousPage('{{ $paginator->getPageName() }}')" href="#" @else href="{{ $paginator->previousPageUrl() }}" @endif tabindex="-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                        prev
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" @if ($livewire) wire:key="{{ $paginator->getPageName() . '-' . $page }}" @endif>
                                <a class="page-link" @if ($livewire) wire:click.prevent="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" href="#" @else href="{{ $url }}" @endif>{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item" @if ($livewire) wire:key="{{ $paginator->getPageName() . '-' . $page }}" @endif>
                                <a class="page-link" @if ($livewire) wire:click.prevent="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" href="#" @else href="{{ $url }}" @endif>{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" @if ($livewire) wire:key="{{ $paginator->getPageName() . '-' . 'next-disabled' }}" @endif>
                    <a class="page-link" @if ($livewire) wire:click.prevent="nextPage('{{ $paginator->getPageName() }}')" href="#" @else href="{{ $paginator->nextPageUrl() }}" @endif aria-label="Next">
                        next
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                    </a>
                </li>
            @else
                <li class="page-item disabled" @if ($livewire) wire:key="{{ $paginator->getPageName() . '-' . 'next' }}" @endif>
                    <a class="page-link" href="#" aria-label="Next">
                        next
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                    </a>
                </li>
            @endif

        </ul>

    </div>

@endif
