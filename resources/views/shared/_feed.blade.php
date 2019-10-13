@if ($feedItems->count() > 0)
    <ul class="list-unstyled">
        @foreach ($feedItems as $status)
            @include('statuses._status',  ['user' => Auth::user()])
        @endforeach
    </ul>
    <div class="mt-5">
        {!! $feedItems->render() !!}
    </div>
@else
    <p>没有数据！</p>
@endif