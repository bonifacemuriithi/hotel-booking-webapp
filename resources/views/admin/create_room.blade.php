<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
        .div_deg{
            padding-top: 30px;
        }
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
    </style>
  </head>
  <body>
 @include('admin.header')
  @include('admin.sidebar') 
  <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <div class="div_center" >
            <h1 style="font-weight:bold;
            font-size:30px;" >Add Room</h1>
            <form action="{{url('add_room')}}" enctype="multipart/form-data" method="post">

               @csrf
               
               
                <div class="div_deg">
                    <label>
                        Room Title
                    </label>
                    <input type="text" name="title">
                </div>
                <div class="div_deg">
                    <label>
                        Description
                    </label>
                    <textarea name="description"></textarea>>
                </div>
                <div class="div_deg">
                    <label>
                        Price
                    </label>
                    <input type="number" name="price">
                </div>
                <div class="div_deg">
                    <label>
                        Room type
                    </label>
                    <select name="type">
                        <option selected value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div class="div_deg">
                    <label>
                        Free wifi
                    </label>
                    <select name="wifi">
                        <option selected value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="div_deg">
                    <label>Upload image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_deg">
                <button onclick="confirmAddRoom()" class="btn btn-primary" value="Add Room">Add Room</button>
                <script>
                function confirmAddRoom() {
                return confirm('Add new room');
                }
</script>
                </div>
                
                
                
            </form>
            </div>
            </div>
         </div> 
         </div>
       @include('admin.footer')
  </body>
</html>