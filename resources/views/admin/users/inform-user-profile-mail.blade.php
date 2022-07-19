<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
      @if(!empty($user))
        <div class="container-fluid">
            <h3> Hi, {{ $user['name'] }}</h3>
        </div>
        <div class="container-fluid">
            <p> This email send from system. </p>
            <p> Please check your information. Is it correct? </p>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th> Name </th>
                    <td class="text-end" name="name"> {{ $user['name'] }} </td>
                </tr>
                <tr>
                    <th> Email </th>
                    <td class="text-end"name="email"> {{ $user['email'] }} </td>
                </tr>
                <tr>
                    <th> Phone </th>
                    <td class="text-end"name="name"> {{ $user['email'] }} </td>
                </tr>
                <tr>
                    <th> Address </th>
                    <td class="text-end"name="address"> {{ $user['email'] }} </td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary"> User Profile </a>
        </div>
        @endif
      </div>
      </div>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>