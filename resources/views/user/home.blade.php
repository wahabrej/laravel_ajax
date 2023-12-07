<!DOCTYPE html>
<html lang="en">
<header class="header_section">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="container">
       
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Home</a>
            <form class="form-inline">
                <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->

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
    <a href="{{url('crud/create')}}" class="btn btn-secondary text-center" style="margin-top:30px;margin-bottom:30px">Create Blog</a>
        <div class="row">
           
            <div class="col-md-8">
                <div class="table ">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)
                            <tr>
                                <th scope="row">{{$data->id}}</th>
                                <td>{{$data->title}}</td>
                                <td>{{$data->body}}</td>
                                <td><a class="btn btn-primary" href="{{url('crud/'.$data->id.'/edit')}}">Update  </a>

                                <form action="{{url('crud/'.$data->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")

                                <button type="submit" style="color:black"  class="btn btn-primary btn-text-black" href="">Delete</button>
                                </form>
                               
                                </td>
                               
                            </tr>
                            @endforeach
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>