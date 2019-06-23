<div class="form-group">
    <label for="@isset($key){{ $key }}@endisset" class="col-sm-2 control-label">@isset($name){{ $name }}@endisset
        :</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" value="@isset($value){{ $value }}@endisset"
               name="@isset($key){{ $key }}@endisset" id="@isset($key){{ $key }}@endisset"
               placeholder="请输入@isset($name){{ $name }}@endisset"/>
    </div>
</div>