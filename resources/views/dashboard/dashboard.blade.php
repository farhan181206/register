@extends('layouts.parent')

@section('title','Halaman')

@section('main','Content')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('send.message')}}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <input type="text" name="target" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea name="message" id="" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-danger" type="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection