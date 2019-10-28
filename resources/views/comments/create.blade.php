@include('layouts.header')
<style type="text/css">
    .container {
        margin-top: 20px;
        padding: 10px;
    }
    .mybtn {
        padding: 10px;
    }
    li {

    }
</style>
<div class="col-md-10 offset-md-1">
    @include('layouts.success')
    <div class="container text-center">
        <h2>Welcome</h2>
        <p>Send FeedBack To Admin</p>
        @include('layouts.errors')
        <form action="/user/comment" method="post">
            @csrf
            <textarea name="content" rows="8" cols="80" class="col-8" required></textarea>
            <div  class="mybtn">
                <input class="btn btn-primary mybtn" type="submit" value="Send FeedBack">
            </div>
        </form>
    </div>
</div>
