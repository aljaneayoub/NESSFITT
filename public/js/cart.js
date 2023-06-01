$(document).ready(function() {
    $('.add-to-cart-btn').click(function() {
      var productId = $(this).data('product-id');
      var productName = $(this).siblings('h3').text();
      var productPrice = $(this).siblings('p').text().replace('Price: TND', '');
      var productQuantity = 1;
  
      var item = {
        id: productId,
        name: productName,
        price: parseFloat(productPrice),
        quantity: productQuantity
      };
  
      $.ajax({
        url: 'add_to_cart.php',
        type: 'POST',
        data: { item: item },
        success: function(response) {
          if (response === 'success') {
            updateCartModal();
            alert('Product added to cart!');
          } else {
            alert(' try again.');
          }
        },
        error: function() {
          alert(' try again.');
        }
      });
    });
  
    function updateCartModal() {
      $('#cartItems').empty();
  
      $.ajax({
        url: 'get_cart_items.php',
        type: 'POST',
        success: function(response) {
          var cartItems = JSON.parse(response);
  
          for (var i = 0; i < cartItems.length; i++) {
            var item = cartItems[i];
            var listItem = '<li>' + item.name + ' - TND' + item.price + '</li>';
            $('#cartItems').append(listItem);
          }
        },
        error: function() {
          alert('try again.');
        }
      });
    }
  });
  



  