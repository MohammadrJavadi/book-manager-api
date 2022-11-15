@props([
    "title", "icon", "items"=>[]
])
<li class="menu">
    <a href="#starter-kit" data-active="true" data-toggle="collapse" aria-expanded="true"
       class="dropdown-toggle">
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
    <ul class="submenu list-unstyled collapse show" id="starter-kit" data-parent="#accordionExample"
        style="">
        @foreach($items as $item)
            <li class="{{ $item["active"]?"active":"" }}">
                <a href="{{ $item["href"] }}">{{ $item["text"] }}</a>
            </li>
        @endforeach
    </ul>
</li>
