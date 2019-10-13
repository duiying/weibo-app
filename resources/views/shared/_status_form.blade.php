<form action="{{ route('statuses.store') }}" method="POST">
    @include('shared._errors')
    {{ csrf_field() }}
    <textarea class="form-control" rows="3" placeholder="请输入内容" name="content">{{ old('content') }}</textarea>
    <button type="submit" class="btn btn-primary pull-float mt-3">发布</button>
</form>