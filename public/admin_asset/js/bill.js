function bill() {
  var current = this;

  this.init = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    current.edit();
    current.update();
  }

  this.edit = function() {
    $('#bill').on('click', '.update-status', function() {
      var billId = $(this).data('id');

      $.ajax({
        url: '/admin/bills/edit',
        type: 'POST',
        data: {
          id: billId
        }
      })
      .done(function(data) {
        $('#bill-status-'+ billId).html(data);
       });
    });
  }

  this.update = function() {
    $('#bill').on('click', '.btn.btn-primary', function() {
      var dataStatus = $('#bill-select').val();
      var dataBillId = $(this).data('id');
     
      $.ajax({
        url: '/admin/bills/update',
        type: 'POST',
        data: {
          billId: dataBillId,
          status: dataStatus
        }
      })
      .done(function(data) {
        var status = lang['status_order'][dataStatus];
        var str = "<p align='center'>"
          + status
          + "</p>"
          + "<a href='javascript:void(0)' align='center'" 
          + "class='update-status'"
          + "data-id=" + dataBillId +">"
          + "Cập nhật"
          +"</a>";
        $('#bill-status-'+dataBillId).html(str);
        alert("Cập nhật trạng thái thành công");
      });
    });
  }
}
