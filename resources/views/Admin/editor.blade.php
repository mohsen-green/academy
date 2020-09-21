<!DOCTYPE html>
<html lang="en">
<head>
    @trixassets
</head>
<body>
    <div class="container ">
        <form method="POST" action="{{route('posts.store')}}">
            @csrf
            @trix(\App\Modles\Post::class, 'content')
            {{-- <input  type="submit"> --}}
        </form>
    </div>
    @php
        $post = App\Models\Post::find(11);
    @endphp
</body>
</html>
