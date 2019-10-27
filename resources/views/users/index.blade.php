@include('layouts.header')
<br>
<style type="text/css">
    #delete:hover {
        background-color: red;
        border: red;
    }
    #role:hover {
        background-color: #76b852;
        border: none;
    }

</style>
@if(!empty($users[0]))
<div class="col-md-10 offset-md-1">
    <div class="container">
        <table class="table">
            <thead class="text-center">
            <tr>
                <th>name</th>
                <th>Email</th>
                <th>Change Role</th>
                <th>Status</th>

            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="/admin/users/{{ $user->id }}" method="post" onsubmit="return confirmationUserToAdmin()">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-secondary" id="role">Admin</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/users/{{ $user->id }}" method="post" onsubmit="return confirmationDeleteUser()">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-secondary" id="delete">Active</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
    <script type="text/javascript">
        const buttons = document.querySelectorAll('#delete');
        buttons.forEach((button) => {
            button.addEventListener("mouseover",() => {
                button.textContent = "Delete";
            });
            button.addEventListener("mouseout",() => {
                button.textContent = "Active";
            })
        });
        function confirmationUserToAdmin(){
            if(confirm("Push OK to give admin rights to the user")) {
                return true;
            }else{
                return false;
            }
        }
        function confirmationDeleteUser()
        {
            if(confirm("Push OK to delete the user")) {
                return true;
            }else{
                return false;
            }
        }
    </script>
@endif
