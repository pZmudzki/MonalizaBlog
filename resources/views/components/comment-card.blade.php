<div class="p-3">
    <div class="flex justify-between items-center">
        <p class="font-semibold">{{ $comment->firstname }} {{ $comment->lastname }}</p>
        <span>{{ $comment->created_at->diffForHumans() }}</span>
    </div>
    <p>{{ $comment->content }}</p>
</div>
