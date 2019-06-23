<div class="form-group">
    <label for="@isset($key){{ $key }}@endisset" class="col-sm-2 control-label">@isset($name){{ $name }}@endisset
        :</label>
    <div class="col-sm-6">
        <textarea class="form-control" name="@isset($key){{ $key }}@endisset" id="@isset($key){{ $key }}@endisset"
                  placeholder="@isset($name)请输入{{ $name }}@endisset">@isset($value){{ $value }}@endisset</textarea>
    </div>
</div>