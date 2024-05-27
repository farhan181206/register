@extends('layouts.parent')

@section('title','Category Edit')

@section('main','Edit Category')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('category.update',$category->id)}}" method="POST" class="col-6">
                @csrf
                @method('PUT')
                <div class="form-group mb-5">
                    <label for="" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$category->title}}">
                </div>
                <div class="form-group mb-5">
                    <label for="">Status</label>
                    <div class="d-block">
                        <div class="">
                            <input type="radio" name="status" value="on" {{ $category->status == 'on' ? 'checked' : '' }} class="form-radio">
                            <label for="" class="form-label">On</label>
                        </div>
                        <div class="">
                            <input type="radio" name="status" value="off" {{ $category->status == 'off' ? 'checked' : '' }} class="form-radio">
                            <label for="" class="form-label">Off</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection