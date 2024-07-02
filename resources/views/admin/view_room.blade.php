<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .table_deg{
            border: 2px solid white;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }
        .th_deg{
            background-color: skyblue;
            padding: 10px;
        }
        tr{
            border: 3px solid white;
        }
        th{
            padding: 10px;
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
            <table class="table_deg" >
                <tr>
                    <th class="th_deg" >Room title</th>
                    <th class="th_deg" >Description</th>
                    <th class="th_deg" >Price</th>
                    <th class="th_deg" >Wifi</th>
                    <th class="th_deg">Room type</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Update</th>

                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data->room_title}}</td>
                    <td>{!! Str::limit($data->description,150)!!}</td>
                    <td>{{$data->wifi}}</td>
                    <td>{{$data->price}}$</td>
                    <td>{{$data->room_type}}</td>
                    <td>
                        <img width="100px"  src="uploads/rooms/{{$data->image}}">
                    </td>
                    <td>
                    <a onclick="return confirm('Confirmation to delete');" class="btn btn-danger" href="{{ url('room_delete/' . $data->id) }}">Delete</a>
                    </td>
                    <td>
                    <a class="btn btn-warning" href="{{ url('room_update' , $data->id) }}">Update</a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
            </div>
            </div>
            </div>
            
       @include('admin.footer')
  </body>
</html>