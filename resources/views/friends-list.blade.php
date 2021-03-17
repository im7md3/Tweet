@auth
<div class="friend p-3 rounded-lg shadow">
        <h3 class="font-weight-bolder mb-4 text-xl">Following</h3>
        <ul class="list-unstyled">
            @foreach (auth()->user()->follows as $user)
                <li class="{{$loop->last?'':'mb-4'}}">
                    <div class=" friend-info">
                        <a class="d-flex align-items-center black font-weight-bolder" href="{{route('profile',$user)}}">
                            <div class="">
                                <img width="60px" height="60" class="rounded-circle mr-2" src="{{$user->avatar}}" alt="">
                            </div>
                            <div class="">
                                {{$user->name}}<br>
                                <small class="text-secondary">{{'@'.$user->username}}</small>
                            </div>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>

    @else
        <div class="">
            <p class="text-lg">New to Tweet?</p>
            <p class="text-sm">Sign up now</p>
            <a class="btn btn-outline-primary shadow rounded-pill" href="{{url('/register')}}">Sign up</a>
        </div>
    @endauth
</div>