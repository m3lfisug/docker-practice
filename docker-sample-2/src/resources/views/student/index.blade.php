<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>生徒一覧</title>
    <link rel="stylesheet" href="css/topNavigation.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<header class="topNavigation">
    <p>ナビゲーション</p>
</header>
<main>
    <p>bladeの中身だよ</p>
    <p>このページには{{ $students->count() }}件表示中</p>
    <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
        <tr>
            <th bgcolor="#EE0000">id</th>
            <th bgcolor="#EE0000" width="150">名前</th>
            <th bgcolor="#EE0000" width="200">年齢</th>
            <th bgcolor="#EE0000" width="200">作成日</th>
            <th bgcolor="#EE0000" width="200">更新日</th>
        </tr>
        @foreach($students AS $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
            </tr>
        @endforeach
        {{ $students->links() }}
    </table>
</main>
<footer>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>