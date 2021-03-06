@extends('layouts.master')
@section('body')
<div class="row">
        <div class="col-md-6">
            <form action="{{route('edit_action')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="student_id" value="{{$editRecord->id}}">
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
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Update Student</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <img src="{{url('/lib/images/'.$editRecord->image)}}" alt="No image" class="img-responsive thumbnail" style="margin-top: 20px">
        </div>
    </div>
@endsection