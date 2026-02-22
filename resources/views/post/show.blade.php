@isset($post)
    <div>
        <p>{{ $post->tittle }}</p>
        <a>{{ $post->description }}</a>
    </div>
@endisset
@empty($post)
    <div>
        <p>Неопределеный Пост</p>
    </div>
@endempty