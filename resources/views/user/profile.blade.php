<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Profile</title>
</head>
<body>
    <div class="container mb-4">
        <div class="table-responsive">
            <table class="table">
            <caption style="caption-side:top" class="text-primary lead font-weight-bold">Profile</caption>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <tr>
                    <td>{{ $LoggedUserInfo['name'] }}</td>
                    <td>{{ $LoggedUserInfo['email'] }}</td>
                    <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container mb-4">
        <div class="table-responsive">
            <table class="table mb-5">
            <caption style="caption-side:top" class="text-primary lead font-weight-bold">Contacts</caption>
                <tr>
                    <th>Country</th>
                    <th>City</th>
                    <th>Postal code</th>
                    <th>Phone</th>
                </tr>
                @foreach($ContactsInfo as $ContactInfo)
                <tr>
                    <td>{{ $ContactInfo->country }}</td>
                    <td>{{ $ContactInfo->city }}</td>
                    <td>{{ $ContactInfo->postal_code }}</td>
                    <td>{{ $ContactInfo->phone }}</td>
                    <td class="col-1">
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Update</button>
                            <div class="dropdown-menu">
                                <form action="/user/contact/update/{{ $ContactInfo->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="country" value="{{ $ContactInfo->country }}" placeholder="country">
                                    <input type="text" name="city" value="{{ $ContactInfo->city }}" placeholder="city">
                                    <input type="text" name="postal_code" value="{{ $ContactInfo->postal_code }}" placeholder="postal_code">
                                    <input type="text" name="phone" value="{{ $ContactInfo->phone }}" placeholder="phone">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="col-1">
                        <form action="/user/contact/delete/{{ $ContactInfo->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="btn-group mt-5">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Add Contact</button>
                <div class="dropdown-menu">
                    <form action="{{ route('user.contact.create') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="Enter country" id="country" name="country" value="{{ old('country') }}">
                        <input type="text" class="form-control" placeholder="Enter city" id="city" name="city" value="{{ old('city') }}">
                        <input type="text" class="form-control" placeholder="Enter postal code" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
                        <input type="text" class="form-control" placeholder="Enter phone" id="phone" name="phone" value="{{ old('phone') }}">
                        <input class="btn btn-primary" type="submit" value="Add Contact">
                    </form>
                </div>
            </div>
            @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('postal_code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</body>
</html>