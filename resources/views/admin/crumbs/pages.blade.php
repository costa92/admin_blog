@if($list && $list->lastPage() > 1 )
    <div class="box-footer clearfix">
        {{ $list->links() }}
    </div>
@endif