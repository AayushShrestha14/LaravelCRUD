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
        <div class="col-md-6">
            <form action="{{route('add')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                <div>
                    <a href="" style="color:red";>{{$errors->first('name')}}</a>
                </div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$editRecord->name}}">
                </div>
                <div class="form-group">
                <div>
                    <a href="" style="color:red";>{{$errors->first('email')}}</a>
                </div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$editRecord->email}}">
                </div>
                <div class="form-group">
                <div>
                    <a href="" style="color:red";>{{$errors->first('image')}}</a>
                </div>
                    <label for="image">Profile Picture</label>
                    <input type="file" name="image" id="image" class="btn btn-default" >
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <img src="{{url('/lib/images'.$editRecord->image)}}" alt="No image" 
        </div>
    </div>
@endsection