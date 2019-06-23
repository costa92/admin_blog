<!-- include('admin.crumbs.uploads.single',['name'=>'封面图片','key'=>'shareImg','value' => '']) -->
<div class="form-group">
    <label for="link" class="col-sm-2 control-label">@isset($name){{ $name }}@endisset</label>
    <div class="col-md-3">
        <input id="@isset($key){{ $key }}@endisset" name="@isset($key){{ $key }}@endisset"
               value="@isset($value){{ $value }}@endisset"
               class="form-control" readonly="true"/>
    </div>
    <div class="col-md-3">
        <div class="fileUpload btn btn-primary">
            <span>上传图片</span>
            <input id="uploadBtn" type="file" class="upload"/>
        </div>
    </div>
</div>


@push('js')
    <script src=" {{ asset('/static/uploads/single.js') }}"></script>
    <script>
        $(".upload").change(function () {
            single($(this), "@isset($key){{ $key }}@endisset");
        });
    </script>

@endpush
