function order() {
  var current = this;

  this.init = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    current.add();
  }

  this.add = function() {
    $('#order-create').on('click', '.btn.btn-primary', function() {
      var dataPhone = $('#phone').val();
      var dataAddress = $('#address_receive').val();
      var dataNote = $('#note').val();
      $.ajax({
        url: '/user/bills/addAjax',
        type: 'POST',
        data: {
          phone: dataPhone,
          address_receive: dataAddress,
          note: dataNote
        }
      })
      .done(function(data) {
        $('.form-error').html('');
        alert('Tạo đơn hàng thành công');
        window.location = "/cart"
      })
      .fail(function(data) {
        var errors = '';
        $('.form-error').html('');
        for(datos in data.responseJSON){
          errors += data.responseJSON[datos] + '<br>';
        }
        $('.form-error').show().html(errors);
      });
    });
  }
}
