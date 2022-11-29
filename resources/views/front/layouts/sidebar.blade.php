<div class="category__list">

    <div id="navbarBasicExample" class="navbar-menu">

        <div class="navbar-item has-dropdown is-hoverable">

        @foreach($categories as $category)
            @if($category->upid == 0)
                <div class="navbar-dropdown">
                    <div class="nested dropdown">
                    <a class="navbar-item">
                        <span class="icon-text ">
                        <span>{{$category->cat__name}}</span>
                        <span class="icon">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        </span>
                    </a>

                    <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">

                            @foreach($categories as $category1)
                                @if($category1->upid == $category->id)
                                    <a href="{{route('front.store', ['slug' => $category1->slug])}}" class="dropdown-item">
                                        {{$category1->cat__name}}
                                    </a>
                                @endif

                            @endforeach

                        </div>
                    </div>
                    </div>
                </div>
            @endif
        @endforeach

        </div>
    </div
</div>
