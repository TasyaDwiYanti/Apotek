<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 20%;
            background-color: #bc7aeb;
            color: white;
            padding: 20px;
            height: 100vh;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #8e81da;
        }

        .content {
            width: 80%;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #f9a1f4;
            padding: 8px;
        }

        th {
            background-color: #ef74c4;
            color: white;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
        }

        td {
            color: black;
            text-align: center;
            vertical-align: middle;
        }

        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn-container a {
            display: block;
            width: 100px;
            text-decoration: none;
            padding: 8px 16px;
            margin-bottom: 5px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border: 1px solid #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-gray {
            color: #fff;
            background-color: gray;
            border: 1px solid gray;
        }

        .btn-gray:hover {
            background-color: #5a5a5a;
            border-color: #5a5a5a;
        }

    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="table_center">

            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>{{$data->product->price}}</td>
                    <td>
                        <img width="100" src="products/{{$data->product->image}}">
                    </td>

                    <td>
                        @if($data->status == 'in progress')
                        <span style="color: red">{{$data->status}}</span>
                        @elseif($data->status == 'On the way')
                        <span style="color: rgb(109, 109, 250)">{{$data->status}}</span>
                        @else
                        <span style="color: orange">{{$data->status}}</span>
                        @endif
                    </td>
                    
                    <td>
                        <div class="btn-container">
                            <a class="btn btn-primary" href="{{url('on_the_way', $data->id)}}">On the way</a>
                            <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Delivered</a>
                        </div>
                    </td>

                    <td>
                        <a class="btn btn-gray" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
                    </td>
                    
                </tr>

                @endforeach
            </table>

            </div>
            
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
