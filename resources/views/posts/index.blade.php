

    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .post {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .post h2 { margin: 0; color: #333; }
        .author { color: #555; font-size: 14px; }
        .actions {
            margin-top: 10px;
        }
        .actions a, .actions form button {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            margin-right: 5px;
        }
        .actions form button {
            background: #dc3545;
        }
        .actions form {
            display: inline;
        }
    </style>
    @extends('layout.main')

    @section('content')
        <h1>All Posts</h1>

        @foreach ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <small>Published by: {{ $post->user->name ?? 'Unknown User' }}</small>
                <div class="actions">
                    <a href="{{ route('posts.edit', $post->id) }}">✏️ Edit</a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">🗑️ Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endsection
