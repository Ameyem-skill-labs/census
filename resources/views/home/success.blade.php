<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation Success</title>
    <!-- Add your preferred CSS framework (e.g., Bootstrap) here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Account Activation Success</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead">
                            {{ Session::get('success_message') }}
                        </p>
                        
                            <!-- <a href="" class="btn btn-primary">Login</a> -->
                            <h2>Go to your MOBILE APP and SignIn there</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
