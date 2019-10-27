@include ('layouts.header')
<h1>Upload your File !</h1>

<div class="login-page">
    <div class="container">
        <div class="row">
            <form action="/process" enctype="multipart/form-data" method="POST">
                @csrf
                <p>
                    <label for="photo">
                        <input type="file" name="photo" id="photo">
                    </label>
                </p>
                <button>Upload</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
