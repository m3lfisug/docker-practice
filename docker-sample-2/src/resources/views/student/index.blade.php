@extends('layouts.master')

<!-- sectionの第一引数を受け取ったyieldに第二引数が反映される -->
@section('title','生徒一覧')

@section('content')
    <hr>
    <p>本文のcontent</p>
    <a href="{{ route('student.create') }}">生徒新規追加</a>
    <p>bladeの中身</p>
    <p>このページには{{ $students->count() }}件表示中</p>
    <table border="1" width="500" cellspacing="0" bordercolor="#333333">
        <tr>
            <th bgcolor="#b0c4de">id</th>
            <th bgcolor="#b0c4de" width="150">名前</th>
            <th bgcolor="#b0c4de" width="200">年齢</th>
            <th bgcolor="#b0c4de" width="200">作成日</th>
            <th bgcolor="#b0c4de" width="200">更新日</th>        
        </tr>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
                <td>
                    <form method="post" action="{{ route('student.edit',$student->id) }}">
                        <button type="submit" class="btn btn-info">編集</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <!-- 結果の残りページ -->
        {{ $students->links() }}
    </table>
@endsection

@section('content_script')
    <script>
        console.log('script test student index');
    </script>