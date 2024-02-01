@csrf 
<dl class="form-list">
    <dt>撮影場所</dt>
    <dd><input type="text" name="title" value="{{ old('title',$location->title) }}"></dd>
    <dt>写真</dt>
    <dd><input type="file" name="images_path" value="{{ old('images_path',$location->images_path) }}"></dd>
    <dt>感想</dt>
    <dd><textarea name="body" rows="5">{{ old('body',$location->body) }}</textarea></dd>
</dl>