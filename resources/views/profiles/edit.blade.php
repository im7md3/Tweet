<x-app>

        {{-- form --}}

            <form action="{{$user->path()}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" required>
                    @error('name')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" value="{{$user->username}}" required>
                    @error('username')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <div class="d-flex align-items-center">
                        <input style="height: auto" class="form-control" type="file" name="avatar" id="avatar" value="{{$user->avatar}}">

                            <img width="40" height="auto" src="{{$user->avatar}}" alt="">
                    </div>
                    @error('avatar')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}" required>
                    @error('email')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                    @error('password')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
                    @error('password_confirmation')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button class="btn btn-outline-primary shadow rounded-pill ">Save</button>
                    <a href="{{$user->path()}}" class="rounded-pill shadow ml-2 btn btn-outline-secondary">Cancel</a>
                </div>
            </form>


        


    
</x-app>