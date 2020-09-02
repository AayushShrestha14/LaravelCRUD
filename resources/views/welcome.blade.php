@extends('layouts.master')
@section('body')
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="row">
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                <div>
                    <a href="" style="color:red";>{{$errors->first('name')}}</a>
                </div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                <div>
                    <a href="" style="color:red";>{{$errors->first('email')}}</a>
                </div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                <div>
                    <a href="" style="color:red";>{{$errors->first('image')}}</a>
                </div>
                    <label for="image">Profile Picture</label>
                    <input type="file" name="image" id="image" class="btn btn-default" >
                </div>
                <div class="form-group">
                <div>
                    <a href="" style="color:red";>{{$errors->first('password')}}</a>
                </div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="cpassword" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-hover">
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Created at</th>
                </tr>
                @foreach($studentData as $key=>$studentDatum)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$studentDatum->name}}</td>
                    <td>{{$studentDatum->email}}</td>
                    <td><img src="{{url('lib/images/'.$studentDatum->image)}}" height="30" width="30" alt=""></td>
                    <td>
                        <a href="" class="btn btn-primary btn-xs">Edit</a>
                        <a href="{{route('delete').'/'.$studentDatum->id}}" class="btn btn-danger btn-xs">Delete</a>
                    </td>
                    <td>{{$studentDatum->created_at->DiffForHumans()}}</td>
                <tr>
                @endforeach
            </table>
            {{$studentData->links()}}
        </div>
    </div>
@endsection