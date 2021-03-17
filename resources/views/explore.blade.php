<x-app>
    <div style="font-size: 16px;top:0;z-index:99999" class="bg-white position-sticky text-lg font-weight-bolder text-shadow p-2 border border-gray ">Explore</div>
    <div class="border border-gray">
        @foreach ($users as $user)
            
                <div class="user d-flex border border-buttom-gray p-3 align-items-center">
                    <a href="{{route('profile',$user->username)}}">
                    <img class="mr-3 rounded-circle" src="{{$user->avatar}}" alt="" width="60" height="60"></a>
                    <div class="">
                        <a href="{{route('profile',$user->username)}}" class="font-weight-bolder black m-0 d-block">{{$user->name}}</a>
                        <a href="{{route('profile',$user->username)}}" class="m-0 black text-sm"> {{'@'.$user->username}}</a>
                    </div>
                    {{-- <a href="{{route('follow-user',$user->username)}}" class=" ml-auto btn btn-outline-primary rounded-pill h-25">Follow</a> --}}
                    
                        
                            <x-follow-button :user='$user'></x-follow-button>
                            
                </div>
        @endforeach
    </div>
    
    
</x-app>