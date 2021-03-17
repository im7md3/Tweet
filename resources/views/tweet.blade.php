
    <div  class="content border border-bottom rounded p-2 m-auto mt-4 ">
        
        <div class="d-flex">
            <div class="mr-3">
                <a href="{{route('profile',$tweet->user)}}">
                    <img width="40px" height="40px" class="rounded-circle" src="{{$tweet->user->avatar}}" alt="">
                </a>
            </div>{{-- avatar --}}

            <div>
                <a class="text-dark text-shadow" href="{{route('profile',$tweet->user)}}"><h6 class="font-weight-bolder m-0">{{$tweet->user->name}}</h6>
                <small class="text-secondary">{{'@'.$tweet->user->username}}</small>
                </a>
                <p class="text-sm mt-3 pr-3 text-break">{{$tweet->body}}</p>

                <div class="d-flex align-items-center">
                    {{-- form like --}}
                    <form method="POST" action="{{route('like',$tweet->id)}}">
                        @csrf
                        <div class="mr-5 ">
                            <button class="{{$tweet->isLikedBy(current_user())?'text-success':'text-muted'}} bg-transparent border-0" type="submit">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                <span class="">{{$tweet->likes}}</span>
                            </button>
                        </div>
                    </form>

                    {{-- form dislike --}}
                    <form method="POST" action="{{route('dislike',$tweet->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <button class="{{$tweet->isDislikedBy(current_user())?'text-danger':'text-muted'}} bg-transparent border-0" type="submit">
                                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                <span class="">{{$tweet->dislikes}}</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>{{-- details --}}
            
        </div>
        
    </div>{{-- tweet --}}
