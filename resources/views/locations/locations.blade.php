@foreach ($locations as $location)
<location class="location-item">
    <div class="location-title"><a href="{{ route('locations.show', $location) }}">{{ $location->title }}</a></div>
    <div class="location-info">
        {{ $location->created_at }}｜{{ $location->user->name }}
    </div>
    <div class="location-control">
        @if (!Auth::user()->is_bookmark($location->id))
        <form action="{{ route('bookmark.store', $location) }}" method="post">
            @csrf
            <button>お気に入り登録</button>
        </form>
        @else
        <form action="{{ route('bookmark.destroy', $location) }}" method="post">
            @csrf
            @method('delete')
            <button>お気に入り解除</button>
        </form>
        @endif
    </div>
</location>
@endforeach
{{ $locations->links() }}