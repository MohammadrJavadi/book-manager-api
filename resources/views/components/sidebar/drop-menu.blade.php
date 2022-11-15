@props([
    "title", "icon", "items"=>[]
])
<li class="menu">
    <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            {{ $icon }}
            <span>{{ $title }}</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="submenu" data-parent="#accordionExample">
        @foreach($items as $item)
            <li>
                <a href="{{ $item["href"] }}">{{ $item["text"] }}</a>
            </li>
        @endforeach
    </ul>
</li>
