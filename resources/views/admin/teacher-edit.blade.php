<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Update Teacher</title>

    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

</head>

<body>

    <header class="header">

        <a href="">Admin Dashboard</a>
    
        <div class="logout">
    
            <a href="/logout" class="btn btn-primary">Logout</a>
    
        </div>
    
    </header>

    <aside>
    
        <ul>
    
            <li>
                <a href="/admissions">Admission</a>
            </li>
    
            <li>
                <a href="/add-student">Add Student</a>
            </li>
    
            <li>
                <a href="/view-student">View Student</a>
            </li>
    
            <li>
                <a href="/admin-add-teacher-form">Add Teacher</a>
            </li>
    
            <li>
                <a href="/view-teacher">View Teacher</a>
            </li>
            <li>
                <a href="">Add Courses</a>
            </li>
            <li>
                <a href="">View Courses</a>
            </li>
    
    
        </ul>
    
    
    </aside>

    <div class="content">

        <h1>Update Teacher</h1>

         
        <center>
            <div class="div_deg">
                

                <form action="/view-teacher/edit/{{$teacher->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" value="<?php echo "$teacher->name"; ?>">
                    </div>

                    <div>
                        <label>Description</label>
                        <input type="text" name="description" value="<?php echo "$teacher->description"; ?>">
                    </div>

                    {{-- <div>
                        <label>Phone</label>
                        <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                    </div> --}}

                    <div>
                        <label>Teacher Old Image</label>
                        <img width="100px" height="100px" src="{{ asset('images/' . $teacher->image) }}" alt="">
                    </div>

                    <div>
                        <label>Teacher New Image</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                        <button class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </center>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>