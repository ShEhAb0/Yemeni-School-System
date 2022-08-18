<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
{{--    <link rel="icon" href="images/y-class.png">--}}
    <title>Admins Login</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Admins Login</div>
                <div class="card-body">
                    <form id="sign_in_adm" method="POST" action="/admin/login" autocomplete="on">
                        @csrf
                        <div>
                            <input type="text" name=username class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
                        </div>
                        @if ($errors->has('username'))
                            <span class="text-danger"><strong>{{ $errors->first('username') }}</strong></span>
                        @endif
                        <br>
                        <div >
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
