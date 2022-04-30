<x-layout>
    <x-slot name="content">
        @foreach($posts as $post)
        <article class="{{ $loop->odd ? 'dark' : 'light' }}">
            <h1>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h1>

            <body>
                <em>
                    {{ $post->created_at }}
                </em><br />
                {{ $post->excerpt }}
            </body>
        </article>
        @endforeach
    </x-slot>
</x-layout>