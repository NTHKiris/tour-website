<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
</head>
<body>
     @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
     @endif
    <h1>Reviews</h1>
    {{--tìm kiếm--}}
        <form action="{{ route('reviews.search') }}" method="GET">
            <input type="text" name="search" placeholder="Tìm kiếm" value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>
        
     @foreach ($reviews as $review)
            <div>
                <h2>Rating: {{ $review->rating }}</h2>
                <p>Comment: {{ $review->comment }}</p>
                <p>User ID: {{ $review->user_id }}</p>
                <p>Tour ID: {{ $review->tour_id }}</p>
                <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="rating" value="{{ $review->rating }}">
                    <button type="submit">Update</button>
                </form>   

                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    
    
</body>
</html>