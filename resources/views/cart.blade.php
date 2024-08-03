<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>ToOKu</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <style>
    .products {
      margin-top: 20px;
    }

    .caption {
      text-align: center;
    }

    .img-size {
      width: 225px !important;
      height: 153px;
      margin-left: 20px;
      margin-top: 10px;
    }

    .cart-delete {
      margin-left: 5px;
      text-decoration: none;
      color: grey;
      font-size: 16px;
      margin-top: 5px;
      cursor: pointer;
    }

    .cart-delete:hover {
      color: red;
    }

    .check-btn {
      float: right;
    }

    .shopping-btn {
      background: #fcfcfc;
      border: 1px solid #7c7e81 !important;
    }
  </style>
</head>

<body>
  @extends('layout')

  @section('title', 'Products')

  @section('content')
  <table id="cart" class="table table-bordered table-hover table-condensed mt-3">
    <thead>
      <tr>
        <th style="width:50%">Product</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Harga Satuan</th>
      </tr>
    </thead>
    <tbody>
      <form action="/checkout" method="POST">
        @csrf
        <?php $total = 0 ?>

        @if(session('cart'))
        @foreach(session('cart') as $id => $details)

        <?php $total += $details['harga'] * $details['quantity'] ?>
        <tr>
          <td data-th="Product">
            <div class="row">
              <div class="col-sm-3 hidden-xs"><img src="{{asset('assets/img/durian.jpg')}}" width="100" height="100" class="img-responsive" />
              </div>
              <div class="col-sm-9">
                <input id="name" for="name" name="name" class="form-control" value="{{ $details['nama'] }}" readonly>
                <p class="remove-from-cart cart-delete" data-id="{{ $id }}" title="Delete">Remove</p>
              </div>
            </div>
          </td>
          <td data-th="Quantity">
            <input readonly type="number" id="qty" for="qty" name="qty" value="{{ $details['quantity'] }}" class="form-control" />
          </td>
          <td data-th="Subtotal" class="text-center">{{ $details['harga'] * $details['quantity'] }}</td>

          <input type="hidden" class="text-center" id="total" for="total" name="total" value="{{ $total }}"></input>

        </tr>


        @endforeach
        @endif
    </tbody>
    <tfoot>
      @if(!empty($details))
      <tr class="visible-xs">
        <td class="text-right" colspan="2"><strong>Total</strong></td>
        <td class="text-center"> {{ $total }}</td>
      </tr>
      @else
      <tr>
        <td class="text-center" colspan="3">Your Cart is Empty.....</td>
      <tr>
        @endif
    </tfoot>


  </table>
  <a href="{{ url('/') }}" class="btn shopping-btn">Continue Shopping</a>
  <button type=" sumbit" class="btn btn-primary">CheckOut</button>


  </form>

  @endsection
</body>
@section('scripts')


<script type="text/javascript">
  $(".remove-from-cart").click(function(e) {
    e.preventDefault();

    var ele = $(this);

    if (confirm("Are you sure want to remove product from the cart.")) {
      $.ajax({
        url: '{{ url("remove-from-cart") }}',
        method: "DELETE",
        data: {
          _token: '{{ csrf_token() }}',
          id: ele.attr("data-id")
        },
        success: function(response) {
          window.location.reload();
        }
      });
    }
  });
</script>

@endsection

</html>