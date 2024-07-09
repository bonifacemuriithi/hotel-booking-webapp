<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
        input {
            width: 100%;
        }
        h1 {
            font-size: 40px !important;
        }
    </style>
</head>
<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding: 20px;" class="room_img">
                            <figure>
                                <img style="height: 300px; width: 800px;" src="{{ asset('uploads/rooms/' . $room->image) }}" alt="Room Image">
                            </figure>
                        </div>
                        <div class="bed_room">
                            <h2>{{$room->room_title}}</h2>
                            <p style="padding: 12px;">{{$room->description}}</p>
                            <h4 style="padding: 12px;">Free wifi: {{$room->wifi}}</h4>
                            <h4 style="padding: 12px;">Room Type: {{$room->room_type}}</h4>
                            <h3 style="padding: 12px;">Price: {{$room->price}}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Book Room</h1>
                            @if($errors->any())
                                <ul style="color: red;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            
                            @if(session()->has('message'))
                                <div class="alert alert-success" id="success-alert">
                                    <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            
                            <form action="{{ url('add_booking', $room->id) }}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" name="name" 
                                    @if (Auth::id()) value="{{ Auth::user()->name }}"
                                    @endif
                                    required>
                                </div>
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" name="email" 
                                    @if (Auth::id()) value="{{ Auth::user()->email }}"
                                    @endif
                                    required>
                                </div>
                                <div class="col-md-12">
                                    <label>Phone</label>
                                    <input type="text" name="phone" 
                                    @if (Auth::id()) value="{{ Auth::user()->phone }}"
                                    @endif
                                    required>
                                </div>
                                <div class="col-md-12">
                                    <label>Start date</label>
                                    <input type="date" id="startDate" name="startDate" required>
                                </div>
                                <div class="col-md-12">
                                    <label>End date</label>
                                    <input type="date" id="endDate" name="endDate" required>
                                </div>
                                <div class="col-md-12" style="padding-top: 20px;">
                                    <input type="submit" class="btn btn-primary" value="Book Room">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('home.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);

            // Hide the success alert after 5 seconds
            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 5000); // 5000 milliseconds = 5 seconds
        });
    </script>
</body>
</html>
