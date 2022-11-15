@props([
    "text", "icon", "href"=>"javascript:void(0);"
])
<li class="menu">
    <a href="{{ $href }}" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            {{ $icon }}
            <span>{{ $text }}</span>
        </div>
    </a>
</li>
