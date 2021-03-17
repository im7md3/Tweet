@auth
    @unless (current_user()->is($user))
    <form method="POST" action="{{route('follow-user',$user->username)}}" id="followForm" class="ml-auto">
        @csrf
        <button id="follow" type="submit" class="btn rounded-pill text-sm shadow {{current_user()->following($user)?'btn-primary':'btn-outline-primary'}}">{{current_user()->following($user)?'Unfollow':'Follow'}}</button>
    </form>
    <div class="alert alert-primary fixed-top m-2" id="success-msg" style="display: none;width:20%">
        
        <span id="close"></span>
        <span id="close"></span>
        </div>
    @endunless

@endauth
