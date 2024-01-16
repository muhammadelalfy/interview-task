<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>List of Clients</title>
</head>

<body>

<div class="container mt-5">
    <h2>List of Clients</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Full English Name</th>
            <th>Full Arabic Name</th>
            <th>Last Login</th>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Country Code</th>
        </tr>
        </thead>
        <tbody>
        <!-- Example client data, replace this with your actual data from the server -->
        @forelse($users as $user)
            <tr>
                <td>{{$user->fullEnglishName}}</td>
                <td>{{$user->fullArabicName}}</td>
                <td>{{@$user->last_login}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone ?? null}}</td>
                <td>{{$user->fullArabicName}}</td>
            </tr>
        @empty
            {{__('there is no users found')}}
        @endforelse

        <!-- Add more rows for additional clients -->
        </tbody>
    </table>
    {{ $users->links('vendor.pagination.bootstrap-4') }}

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
