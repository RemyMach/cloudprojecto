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
</style>
<div class="login-page">
    <div class="col-md-10 offset-md-1">
        <div class="container">
            <h1>Upload your File !</h1>
            <div class="row">
                <form action="/upload" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                            <input type="file" name="photo" id="photo" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
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
