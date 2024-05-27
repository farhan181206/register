@extends('layouts.parent')

@section('title','Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div  class="col-6">
            <div class="form-group mb-5">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" disabled value="{{$category->title}}" class="form-control">
            </div>
            <div class="form-group mb-5">
                <label for="">Status</label>
                <div class="d-block">
                    <div class="">
                        <input type="checkbox" name="status" value="on" disabled {{ $category->status == 'on' ? 'checked' : '' }} class="form-checkbox">
                        <label for="" class="form-label">On</label>
                    </div>
                    <div class="">
                        <input type="checkbox" name="status" value="off" disabled {{ $category->status == 'off' ? 'checked' : '' }} class="form-checkbox">
                        <label for="" class="form-label">Off</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <a href="{{route('category.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection