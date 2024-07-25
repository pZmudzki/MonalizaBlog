<div class="p-3">
    <div class="flex justify-between items-center">
        <p class="font-semibold">{{ $comment->firstname }} {{ $comment->lastname }}</p>
        <div class="flex items-center gap-2">
            <span>{{ $comment->created_at->diffForHumans() }}</span>
            @if (auth()->user())
                <form action="{{ route('comment.highlight', $comment) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="text-2xl font-bold text-yellow-700">{{ $comment->starred ? '★' : '☆' }}</button>
                </form>
                <form action="{{ route('comment.destroy', $comment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="p-1 bg-red-400">Usuń</button>
                </form>
            @endif
        </div>
    </div>
    <p>{{ $comment->content }}</p>
</div>
