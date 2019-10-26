@include('layouts.header')
<style type="text/css">
    .container {
        margin-top: 20px;
        padding: 10px;
    }
</style>
<div class="col-md-10 offset-md-1">
    <div class="container text-center">
        <h2>Welcome</h2>
        <p>Send FeedBack To Admin</p>
        <p>COMMENT</p>
        <form action="/user/comment" method="post">
            @csrf
            <textarea name="content" rows="8" cols="80"></textarea>
            <div>
                <input class="btn btn-primary" type="submit" value="Send FeedBack">
            </div>
        </form>
    </div>
</div>
