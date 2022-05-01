<x-layout>
    <x-slot name="content">
        @foreach($posts as $post)
        <article class="{{ $loop->odd ? 'dark' : 'light' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <p>
                <a href='/categories/{{ $post->category->id }}'>{{ $post->category->name }}</a>
            </p>

            <body>
                <em>
                    Created at: {{ $post->created_at }}
                    <br />
                    Published at: {{ $post->published_at }}
                    <br />
                </em>
                {{ $post->excerpt }}
            </body>
        </article>
        @endforeach
    </x-slot>
</x-layout>