@extends('layouts.master')

@section('title','生徒更新')

@section('content')

@section('content')
    <form method="post" action="{{ route('student.update',student->id) }}">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label >名前</label>
            <input type="name" name="name" class="form-control" value="{{ old('name') ?? $student->name }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">年齢</label>
            <input type="number" name="age" class="form-control" id="exampleFormControlInput1" value="{{ old('age') ?? $student->age }}">
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
    </form>
@endsection

@section('content_script')
    <script>
        console.log('script test student edit');
    </script>
@endsection