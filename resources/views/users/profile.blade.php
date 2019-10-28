@include('layouts.header')
<br>
<style type="text/css">
    #password {
        text-align: center;
        padding: 10px;
    }
    #save {
        background-color: #76b852;
        border: none;
    }
    #save:hover {
        color: #76b852;
        background-color: #F2F2F2;
        border: none;
    }
    .password-container {
        margin-top: 20px;
    }
    .container {
        padding: 20px;
    }
</style>
<div class="col-md-10 offset-md-1">
    @include('layouts.errors')
    @include('layouts.success')
    <div class="container">
        <h3 id="password">Informations</h3>
        <form action="/user/profile/{{ $user->id }}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="name" value="{{ $user->name }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Birthday</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="birthday" value="{{ $user->birthday }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary offset-10" id="save">Save</button>
        </form>
    </div>


    <div class="container password-container">
        <h3 id="password">Password</h3>
        <form action="/user/profile/password/{{ $user->id }}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="azertyuiop" required>
                </div>
            </div>


            <div class="form-group row">
                <label for="inputPassword" class="col-sm-5 col-form-label">Confirmation</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_confirmation" value="azertyuiop" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary offset-10" id="save">Save</button>

        </form>
    </div>
</div>

</body>
</html>

