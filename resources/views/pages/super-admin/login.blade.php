<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Super Admin Login</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="sign_in_adm" method="POST" action="{{ route('superAdmin.check') }}" autocomplete="on">
                        {{ csrf_field() }}
                        <h2>Super Admin Login</h2>
                        <div >
                            <input type="text" name=username class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus>
                        </div>
                        @if ($errors->has('username'))
                            <span ><strong>{{ $errors->first('username') }}</strong></span>
                        @endif
                        <br>
                        <div >
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <br>
                        <div >
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
