@include ('layouts.header')
<style type="text/css">
    .container {
        text-align: center;
        margin: 10px;
    }
    .row {
        flex: auto;
        justify-content: center;
    }
    .title {
        margin: 10px;
    }
    .error{

    }
</style>
<div class="login-page">
    <div class="col-md-10 offset-md-1">
        @include('layouts.success')
        <div class="container">

            <h1>Upload your File !</h1>
            @include('layouts.errors')
            <div class="row">
                <form action="/upload" enctype="multipart/form-data" method="POST">
                    @csrf
                    <h5 class="title">Description of the file:</h5>
                    <textarea name="description" rows="8" cols="80" required></textarea>
                    <h5 class="title">Name of the file(at least 5 characters):</h5>
                    <input type="text" name="title" id="title" class="form-control" required>
                    <h5 class="title">The file:</h5>
                    <div class="input-group mb-3">
                            <input type="file" name="file" id="file" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary" id="button-addon2">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
