function cart() {
  this.init = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    this.addItem();
    this.changeNumberAdd();
    this.changeNumberMinus();
    this.updateQuantityAdd();
    this.updateQuantityMinus();
    this.deleteItem();
  }

  this.addItem = function() {
    $('.add-to-cart').on('click', function(event) {
      event.preventDefault();
      var dataId = $(this).data('id');
      if($('.number').html()) {
        var dataNumber = parseInt($('.number').html());
      } else {
        var dataNumber = 1;
      }

      $.ajax({
        url: '/cart/addItem',
        type: 'POST',
        dataType: 'json',
        data: {
          id: dataId,
          number: dataNumber
        },
        complete: function (data) {
          switch (data.status) {
            case 200:
              alert("Sản phẩm đã được thêm vào giỏ hàng");
              break;
            case 404:
              alert("Không tìm thấy sản phẩm");
              break;
            default:
              alert("Lỗi");
              break;
          }
        }
      });
    });
  }

  this.changeNumberAdd = function() {
    $('.operator-add').on('click', function() {
      var number = parseInt($('.number').html());
      var sum = parseInt($('.sum').html());
      if (number >= sum) {
        number = sum;
      } else {
        number += 1; 
      }
      $('.number').html(number);
    });
  }

  this.changeNumberMinus = function() {
    $('.operator-minus').on('click', function() {
      var number = parseInt($('.number').html());
      if (number <= 1) {
        number = 1;
      } else {
        number -= 1; 
      }
      $('.number').html(number);
    });
  }

  this.updateQuantityAdd = function() {
    var dataId;
    $('#cart').on('click', '.cart-quantity-up', function(event) {
      event.preventDefault();
      dataId = $(this).data('id');
      $.ajax({
        url: 'cart/upQuantity',
        type: 'GET',
        data: {
          id: dataId
        }
      })
      .done(function(data) {
        $('#cart').html(data);
      });
    });
  }

  this.updateQuantityMinus = function() {
    var dataId;
    $('#cart').on('click', '.cart-quantity-down', function(event) {
      event.preventDefault();
      dataId = $(this).data('id');
      $.ajax({
        url: 'cart/downQuantity',
        type: 'GET',
        data: {
          id: dataId
        }
      })
      .done(function(data) {
        $('#cart').html(data);
      });
    });
  }

  this.deleteItem = function() {
    var dataId;
    $('#cart').on('click', '.delete', function(event) {
      event.preventDefault();
      dataId = $(this).data('id');
      $.ajax({
        url: 'cart/deleteItem',
        type: 'POST',
        data: {
          id: dataId
        },
        success: function(data) {
          $('#cart').html(data);
          alert("Xóa thành công");
        }
      })
      $(this).parent().parent().remove();
    });
  };  
}
