<div  class="shadow m-auto">
    @forelse ($tweets as $tweet)
        <div  class=" border border-gray">
            @include('tweet')
        </div>
    @empty
        <p  class="text-break m-auto alert alert-primary text-sm shadow rounded-lg">No tweets yet.</p>
    @endforelse($tweets as $tweet)
</div>
