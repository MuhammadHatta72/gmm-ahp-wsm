<li class="nav-item">
    <button type="button" class="nav-link {{ $active ? $active : '' }}" role="tab" data-bs-toggle="tab" data-bs-target="#{{ $key }}" aria-controls="{{ $key }}" aria-selected="true">
        {{ $icon ?? '' }} {{ $title }}
    </button>
</li>
