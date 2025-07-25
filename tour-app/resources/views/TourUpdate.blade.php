<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{--
    <form action="{{ route('tours.update') }}" method="POST">
        @csrf
        <label for="name">Tìm ID cần thay đổi:</label>
        <input type="text" name="name" id="id">
        <button type="submit">Tìm</button>
    </form>

     <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="name">Tên mới:</label>
        <input type="text" name="name" id="newName">
        <button type="submit">Gửi</button>
        @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    </form>
--}}
</body>
</html>