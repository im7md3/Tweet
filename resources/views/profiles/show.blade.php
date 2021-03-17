
<x-app>
    <div style="font-size: 16px; top:0;z-index:99999" class="bg-white position-sticky p-2 border border-gray  ">
        <p  style="font-size: 14px" class="font-weight-bolder text-shadow m-0">{{$user->name}}</p>
        <p style="font-size: 11px" class="font-weight-light text-muted m-0">{{$user->tweets()->count().' tweets'}}</p>
    </div>
    <header   class="mx-auto mb-3  ">
        <div class="position-relative">
            <img class="img-fluid rounded-lg  mb-3 "  src="{{asset('img/header.jpg')}}" alt="">
            <img class="rounded-circle position-absolute" src="{{$user->avatar}}" alt="" style="top: 40%;
            left: calc(50% - 75px); width: 150px; height:150px">
        </div>
            
        <div class="d-flex justify-content-between ">

            <div class="">
                <h2 class="font-weight-bolder text-lg">{{$user->name}}</h2>
                <p class="font-weight-light text-sm text-secondary">Joind {{$user->created_at->diffForHumans()}}</p>
            </div>

            <div class="d-flex ">
                @can('edit', $user)
                    <a href="{{$user->path('edit')}}" class="btn btn-outline-dark mr-2 rounded-pill text-sm shadow align-self-baseline">Edit profile</a>
                @endcan
                    
                
                <x-follow-button :user="$user"></x-follow-button>
            </div>

        </div>

        <p class="text-sm ">بيغاسوس</p>
        
    </header>
    @include('timeLine')

    

</x-app>
