<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Products</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body>
  @extends('layout')

  @section('title', 'Products')

  @section('content')
  <table id="cart" class="table table-bordered table-hover table-condensed mt-3">
  </table>
  <div class="container products">
    <div class="row">
      @foreach($products as $product)
      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="card mb-4">
          <img src="{{asset('assets/img/durian.jpg')}}" class="card-img-top img-size" alt="{{ $product->nama }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->nama }}</h5>
            <p class="card-text">{{ ($product->deskripsi) }}
            </p>
            <p class="card-text"><strong>Price: </strong> {{ $product->harga }}</p>
            <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
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