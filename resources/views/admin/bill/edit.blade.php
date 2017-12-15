<div class="status">
    <select class="form-control" id="bill-select">
        @foreach ($status as $key => $value)
            @if ($key == $bill->status)
                <option value="{!! $key !!}" selected="selected"
                    id="status-select-{!! $key !!}" 
                    data-status="{!! $key !!}">
                    {!! $value !!}
                </option>
            @else
                <option value="{!! $key !!}"
                    id="status-select-{!! $key !!}" 
                    data-status="{!! $key !!}">
                    {!! $value !!}
                </option>
            @endif
        @endforeach
    </select>
    
    <button type="button" class="btn btn-primary" 
        data-id="{!! $bill->id !!}">
        Cập nhật</button>
</div>
