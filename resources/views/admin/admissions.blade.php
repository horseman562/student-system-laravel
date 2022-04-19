

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
    <title>Admin Dashboard</title>
</head>

<body>

    

    <header class="header">

        <a href="">Admin Dashboard</a>
    
        <div class="logout">
    
            <a href="logout.php" class="btn btn-primary">Logout</a>
    
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
        <center>
            <h1>Applied For Admission</h1>

            <br><br>

            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    
                    <th style="padding: 20px; font-size: 15px;">Message</th>
                </tr>

                @foreach($ad as $ads)
            {{-- <article class="mb-2">
                <a href="/posts/{{ $ads->id }}/edit" class="text-xl font-bold text-blue-500">{{ $ads->email }}</a>
                <p class="text-md text-gray-600">{{ $ads->name }}</p>

                <hr class="mt-2">
            </article> --}}
            <tr>
                <td style="padding: 20px;"><?php echo "{$ads['name']}"; ?></td>
                <td style="padding: 20px;"><?php echo "{$ads['email']}"; ?></td>
                <td style="padding: 20px;"><?php echo "{$ads['message']}"; ?></td>
            </tr>
        @endforeach


            </table>

            


        </center>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     

</body>

</html>