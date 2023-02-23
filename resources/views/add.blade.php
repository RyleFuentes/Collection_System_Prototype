<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark">
        <div class="container p-5">
            <div class="container m-auto" style="width: 50%">
                <h1 class="text-center">Add</h1>
                <form action="{{route('debt')}}" method="post" class="form-group">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="amount">
                    
                    </div>

                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>