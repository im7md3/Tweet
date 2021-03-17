<div style="font-size: 16px;top:0;z-index:99999" class="bg-white position-sticky text-lg font-weight-bolder text-shadow p-2 border border-gray ">Home</div>
<div  class="shadow tweet-panel border border-gray rounded pt-3  pb-0 mb-3 m-auto" >
    
    <form method="POST" action="{{route('insertTweet')}}" id="tweetForm" >
        @csrf
        <textarea id="message-tweet" style="width:90%"  class="form-control border border-primary m-auto" name="body" placeholder="What's Up?" autofocus required></textarea>
        <footer style="width:90%" class="align-items-center mb-0 m-auto d-flex justify-content-between ">
            <img width="40px" height="40px" class="rounded-circle " src="{{auth()->user()->avatar}}" alt="">
            <button id="tweet" class="btn btn-outline-primary shadow ml-4 mb-3 mt-3 rounded-pill" type="submit">Tweet</button>
        </footer>
        
                @if(Session::has('success'))
                    <div class="msg alert alert-primary fixed-top m-2" id="success-msg" style="width:20%">{{Session::get('success')}}
                    </div>
                @endif

                @if(Session::has('failed'))
                    <div class="msg alert alert-danger fixed-top m-2" id="success-msg" style="width:20%">{{Session::get('failed')}}
                    </div>
                @endif
    </form>
</div>
@section('script')
<script>
    $(document).on('click','.msg',function(){
        $('.msg').hide(800);
    })
</script>
    
@endsection