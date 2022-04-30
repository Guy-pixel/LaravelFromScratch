<x-layout>
    <x-slot name="content">
        @foreach($posts as $post)
        <article class="{{ $loop->odd ? 'dark' : 'light' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <body>
                <em>
                    {{ $post->date }}
                </em><br />
                {{ $post->excerpt }}
            </body>
        </article>
        @endforeach
    </x-slot>
</x-layout>