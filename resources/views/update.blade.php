<!DOCTYPE html>
<html lang="en">
<header class="header_section">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="container">

        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Navbar</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                @if (Route::has('login'))
                @auth

                <li class="nav-item login_css">
                    <x-app-layout> </x-app-layout>
                </li>
                @else
                <li class="nav-item login_css">
                    <a class="btn btn-primary " href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{route('register')}}">Register</a>
                </li>
                @endauth
                @endif
            </form>
        </nav>
    </div>
</header>

<body>
    <div class="container">
        <h1 class="text-center" style="margin-top:30px">Enter the Update Data</h1>
        <div class="row">

            <div class="col-md-8">
                <div class="table ">
                    <form  action="{{url('crud/'.$data->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title </label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}"  placeholder="Enter title ....">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" class="form-control" value="{{$data->body}}" name="body" >
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>