<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
        .div_design {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        .table_design {
            border: 2px solid #872ca9;
            width: 100%;
            max-width: 1200px;
        }
        th {
            background-color: #e985c6;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }
        td {
            border: 1px solid rgb(233, 133, 198);
            text-align: center;
            color: black;
        }
        img {
            height: 125px;
            width: 125px;
        }
        input[type='search']
        {
            width: 500px;
            height: 60px;
            margin-left: 50px;
        }


    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>

                <div class="div_design">
                    <table class="table_design">
                        <tr>
                            <th>Product Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                        @foreach($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!! Str::limit($products->description, 40) !!}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img src="{{ url('products/'.$products->image) }}" alt="{{$products->title}}">
                            </td>

                            <td>
                                <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                            </td>

                            <td>
                                <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="div_design">
                    {{$product->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
    
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        function confirmation(event) {
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title: "Are You Sure to Delete This Product?",
                text: "This Delete will be Permanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
</body>
</html>
