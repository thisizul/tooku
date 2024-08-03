<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

  <title>ToOKu</title>
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
      @csrf
      <?php $total = 0 ?>
      @if(session('cart'))
      @foreach(session('cart') as $id => $detail)
      <?php $total += $detail['harga'] * $detail['quantity'] ?>
      <tr>
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-3 hidden-xs"><img src="{{asset('assets/img/durian.jpg')}}" width="100" height="100" class="img-responsive" />
            </div>
            <div class="col-sm-9">
              <input type="text" readonly name="name" class="form-control" id="name" placeholder="masukan nama" value="{{ $detail['nama'] }}">
            </div>
          </div>
        </td>
        <td data-th="Quantity">
          <input type="number" readonly value="{{ $order['qty'] }}" for="qty" name="qty" id="qty" class="form-control quantity" />
        </td>
        <td data-th="harga">
          <input type="number" class="form-control" readonly value="{{ $detail['harga'] }}" />
        </td>
      </tr>

      @endforeach
      @endif
    </tbody>
    <tfoot>
      @if(!empty($detail))
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
  </form>

  <button id="pay-button">Pay!</button>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div id="snap-container">

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
          onSuccess: function(result) {
            /* You may add your own implementation here */
            window.location.href = '/invoice/{{$order->id}}'
            //alert("payment success!");
            console.log(result);
          },
          onPending: function(result) {
            /* You may add your own implementation here */
            alert("wating your payment!");
            console.log(result);
          },
          onError: function(result) {
            /* You may add your own implementation here */
            alert("payment failed!");
            console.log(result);
          },
          onClose: function() {
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
  </div>
</body>
@endsection

</html>