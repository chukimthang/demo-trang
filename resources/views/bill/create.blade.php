<div class="modal fade create" tabindex="-1" role="dialog"
    id="order-create">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title" align="center">
                    Xác nhận thông tin
                </h3>
            </div>

            <div class="form-error"></div>

            <div class="modal-body form">
                <div class="form-group">
                    {!! Form::label('full_name', 'Họ tên') !!}
                    {!! Form::text('full_name', Auth::id() ? Auth::user()->full_name : "", [
                        'class' => 'form-control',
                        'disabled' => 'true'
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', Auth::id() ? Auth::user()->email : "", [
                        'class' => 'form-control',
                        'disabled' => 'true'
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone', 'Số điện thoại') !!}
                    {!! Form::text('phone', null, [
                        'class' => 'form-control'
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('address_receive', 'Địa chỉ nhận') !!}
                    {!! Form::text('address_receive', null, [
                        'class' => 'form-control'
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('note', 'Ghi chú') !!}
                    {!! Form::textarea('note', null, ['class' => 'form-control', 'size' => '30x5']) !!}
                </div>
            </div>

            <div class="modal-footer form">
                {!! Form::submit('Đóng', [
                    'class' => 'btn btn-default',
                    'data-dismiss' =>'modal'
                ]) !!}
                {!! Form::submit('Đặt hàng', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
