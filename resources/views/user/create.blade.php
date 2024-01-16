<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Client Registration Form</title>
</head>
<body>

<div class="container mt-5">
    <h2>Client Registration Form</h2>
    <form action="{{route('users.store')}}" method="post">
        <div class="form-group">
            <label for="fullEnglishName">Full English Name</label>
            <input type="text" class="form-control" id="fullEnglishName" name="fullEnglishName"
                   placeholder="Enter full English name">
        </div>

        <div class="form-group">
            <label for="fullArabicName">Full Arabic Name</label>
            <input type="text" class="form-control" id="fullArabicName" name="fullArabicName"
                   placeholder="Enter full Arabic name">
        </div>


        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="tel" class="form-control" id="mobile" name="phone" placeholder="Enter mobile number">
        </div>


        <div class="form-group">
            <label for="countryCode">Countries</label>
            <select class="form-control" id="countryCode" name="country_code">
                @forelse($countries as $country)
                    <option value="{{$country->code}}">{{$country->name}}</option>
                @empty
                    {{__('there is no countries')}}
                @endforelse
                <!-- Add more options as needed -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(function () {
        // Initialize Select2
        $('#countryCode').select2({
            ajax: {
                url: '/search-countries',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: params.term, // Search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(country) {
                            return {
                                id: country.code,
                                text: country.name
                            };
                        })
                    };
                }
            }
        });
    });
</script>
</body>
</html>
