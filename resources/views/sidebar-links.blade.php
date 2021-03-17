<section class="mb-4">
    <header>
        <a href="{{route('home')}}">
            <img width="40" src="{{asset('img/Twitter_Logo_Blue.svg')}}" alt="">
        </a>
    </header>
</section>
@auth

        <ul class="list-unstyled bg-gradient-primary text-shadow">
            <li>
                <a href="{{route('home')}}" class="font-weight-bold mb-4 d-block text-lg black black">Home</a>
            </li>
            <li>
                <a href="{{route('explore')}}" class="font-weight-bold mb-4 d-block text-lg black">Explore</a>
            </li>
            <li>
                <a href="" class="font-weight-bold mb-4 d-block text-lg black">Notifications</a>
            </li>
            <li>
                <a href="" class="font-weight-bold mb-4 d-block text-lg black">Messages</a>
            </li>
            <li>
                <a href="" class="font-weight-bold mb-4 d-block text-lg black">Bookmarks</a>
            </li>
            <li>
                <a href="" class="font-weight-bold mb-4 d-block text-lg black">Lists</a>
            </li>
            <li>
                <a @auth
                    href="{{route('profile',auth()->user())}}"
                @endauth  class="font-weight-bold mb-4 d-block text-lg black">Profile</a>
            </li>
            <li class="">
                <form method="POST" action="/logout">
                    @csrf
                    <button class="text-shadow border-0 bg-transparent p-0 font-weight-bold mb-4 d-block text-lg black">Logout</button>
                </form>
            </li>
            
        </ul>

        <div class="position-absolute" style="bottom:-135px;">
            <a class="d-flex align-items-center black text-shadow" href="{{route('profile',auth()->user()->username)}}">
                <div class="div"><img width="40" height="40" src="{{auth()->user()->avatar}}" alt="" class="rounded-circle shadow mr-3"></div>
                <div class="">
                    <div class="">
                        <h6 style="font-size: 12px;" class="font-weight-bolder m-0">{{auth()->user()->name}}</h6>
                        <small class="text-secondary">{{'@'.auth()->user()->username}}</small>
                    </div>
                </div>
            </a>
        </div>

    @else
        <ul class="list-unstyled">
            <li>
                <a href="{{route('explore')}}" class="font-weight-bold mb-4 d-block text-lg black">Explore</a>
            </li>
        </ul>

@endauth
