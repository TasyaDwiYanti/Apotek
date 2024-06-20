<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <style type="text/css">
      input[type='text'] {
        width: 400px;
        height: 55px;
      }

      .div_design {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 25px;
      }

      .table_design {
        text-align: center;
        margin: auto;
        border: 2px solid #872ca9;
        margin-top: 50px;
        width: 600px;
      }

      th {
        background-color: #e985c6;
        padding: 10px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }

      td {
        color: rgb(26, 24, 24);
        padding: 10px;
        border: 1px solid rgb(233, 133, 198);
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
          <h2 style="color: black">Add Category</h2>

          <div class="div_design">
            <form action="{{url('add_category')}}" method="post">
              @csrf

              <div>
                <input type="text" name="category">
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
            </form>
          </div>

          <div>
            <table class="table_design">
              <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>

              @foreach ($data as $data)
              <tr>
                <td>{{$data->Category_name}}</td>
                <td>
                  <a class="btn btn-success" href="{{url('edit_category', $data->id)}}">Edit</a>
                </td>

                

                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category', $data->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach

            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>

    <script type="text/javascript">
      function confirmation(event) {
        event.preventDefault();
        var urlToRedirect = event.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
          title: "Are You Sure To Delete This",
          text: "This Delete Will Be Permanent",
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

