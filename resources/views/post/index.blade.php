@isset($posts)
    @foreach ($posts as $post)
        <div>
            <p>{{ $post->tittle }}</p>
            <a>{{ $post->description }}</a>
        </div>
    @endforeach
@endisset