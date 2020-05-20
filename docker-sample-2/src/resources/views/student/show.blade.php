@extends('layouts.master')

@section('title','生徒閲覧')

@section('content')
    <div class="form-group">
        <label >名前</label>
        <input type="name" name="name" class="form-control" value="{{ $student->name }}" disabled>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">年齢</label>
        <input type="number" name="age" class="form-control" id="exampleFormControlInput1" value="{{ $student->age }}" readonly>
    </div>
@endsection

@section('content_script')
    <script>
        console.log('script test student show');
    </script>
@endsection
