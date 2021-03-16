<head>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="row" style="padding-top: 50px">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="" method="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>
</body>
