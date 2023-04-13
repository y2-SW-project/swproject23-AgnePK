@extends('user.jewellery.shop')

@section('content')
    <table id="cart" class="table table-bordered m-5">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                {{-- <th>Total</th> --}}
                {{-- <th></th> --}}
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
                                        class=" w-50" />
                                </div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $details['price'] }}</td>

                        {{-- <td data-th="Subtotal" class="text-center"></td> --}}
                        {{-- <td class="actions">
                            <a class="btn btn-outline-danger btn-sm delete-product"><i class="fa fa-trash-o"></i>Delete</a>
                        </td> --}}
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
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title fs-5" id="staticBackdropLabel"><strong>Card informarion</strong> > Billing address > Purchase</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-lg py-1">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col">
                                                <h1 class="h4 py-3">Card & Email</h1>
                                                <div class="col-lg-12 input">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="col-lg-5">
                                                            <p>Name</p>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <p>surname</p>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>e-mail</p>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>card number</p>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="col-lg-5">
                                                            <p>EXPIRATION</p>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <p>cvc</p>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Continue Purchase</button>
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
