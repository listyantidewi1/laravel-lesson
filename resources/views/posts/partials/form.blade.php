<div class="form-group">
    <label for="title">Title</label>
    <input id="title" class="form-control" type="text" name="title" placeholder="Enter post title" value="{{ old('title', optional($post ?? null)->title) }}" />
</div>
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" class="form-control" name="content" placeholder="Write something here...">{{ old('content', optional($post ?? null)->content) }}</textarea>
</div>
@error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
