<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour</title>
</head>
<body>
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
     @endif
    <h1>Tours</h1>
        <div>
            @foreach ($tours as $tour)
                <div>
                    <h2>Title: {{ $tour->title }}</h2>
                    <p>id: {{ $tour->id }}</p>
                    <p>Description: {{ $tour->description }}</p>
                    <p>Duration: {{ $tour->duration }} days</p>
                    <p>Price: ${{ $tour->price }}</p>
                    <p>Rating: {{ $tour->average_rating }}</p>
                     <!-- Giả sử bạn có thuộc tính này -->

                    <form action="{{ route('tours.update', $tour->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" value="{{ $tour->title }}" required>
                        <button type="submit">Update</button>
                    </form>
                    
                    <form action="{{ route('tours.destroy', $tour->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
</body>
</html>