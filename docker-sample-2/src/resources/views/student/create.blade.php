@extends('layouts.master')

@section('title','生徒新規作成')

@section('content')

    <form method="post" action="{{ route('student.store') }}">
        @csrf

        <div class="form-group">
            <label >名前</label>
            <input type="name" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">年齢</label>
            <input type="number" name="age" class="form-control" id="exampleFormControlInput1" value="{{ old('age') }}">
        </div>
        <button type="submit" class="btn btn-primary">送信</button>

    </form>
@endsection

@section('content_script')
    <script>
        console.log('script test student index');
    </script>
@endsection
