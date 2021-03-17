<x-master>
    <section class="container">
        <main>
            <div class="position-fixed">
                <div class=" px-5 sidebar mr-auto">@include('sidebar-links')</div>
            </div>
            <div class="d-flex" style="width: calc(100% - 227px);margin-left: 227px;">

                    <div class=" mr-4 ml-4 w-75 position-relative" style="">
                        {{ $slot }}
                    </div>
                    <div class="p-3 w-50">@include('friends-list')</div>
            </div>
        </main>
    </section>




</x-master>
