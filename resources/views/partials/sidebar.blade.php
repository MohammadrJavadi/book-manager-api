    <!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            {{--            <x-sidebar.active-menu title="Profile" :items="[['href'=>route('profile.show'), 'text'=>'Your profile', 'active'=>true]]">--}}
            {{--                <x-slot name="icon">--}}
            {{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
            {{--                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
            {{--                         class="feather feather-terminal">--}}
            {{--                        <polyline points="4 17 10 11 4 5"></polyline>--}}
            {{--                        <line x1="12" y1="19" x2="20" y2="19"></line>--}}
            {{--                    </svg>--}}
            {{--                </x-slot>--}}
            {{--            </x-sidebar.active-menu>--}}

            <x-sidebar.menu text="Dashboard" :href="route('dashboard')">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                </x-slot>
            </x-sidebar.menu>
            <x-sidebar.drop-menu title="Books">
                <x-slot:icon>
                    <i class="fa-solid fa-book"></i>
                </x-slot:icon>
                <x-slot:items>
                    <x-sidebar.menu-item :href="route('books.index')" text="books list"/>
                    @can("create", \App\Models\Book::class)
                    <x-sidebar.menu-item :href="route('books.create')" text="create book"/>
                    @endcan
                </x-slot:items>
            </x-sidebar.drop-menu>
        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->
