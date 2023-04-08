@extends('user.jewellery.shop')

@section('content')
    <table id="cart" class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    <tr rowId="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('storage/images/' . $details['img']) }}"
                                        class="card-img-top" />
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>

                        {{-- <td data-th="Subtotal" class="text-center"></td> --}}
                        <td class="actions">
                            <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash-o"></i>Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/user/jewellery') }}" class="btn btn-secondary"><i class="fa fa-angle-left"></i>
                        Continue
                        Shopping</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Checkout</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".edit-cart-info").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('user.update.shopping.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".delete-product").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('user.delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
