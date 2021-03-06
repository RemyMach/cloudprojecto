@include('layouts.header')
<br>
<style type="text/css">
 #delete:hover {
     background-color: red;
     border: red;
 }
</style>
@if( !empty($comments[0]))
    <div class="col-md-10 offset-md-1">
        @include('layouts.success')
        <div class="container">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Content</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$user[$comment->id]['name']}}</td>
                            <td>{{$user[$comment->id]['email']}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>{{$comment->content}}</td>
                            <td><form action="/admin/comment/{{ $comment->id }}" method="post" onsubmit="return confirmationDeleteComment()">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-secondary" id="delete">Delete</button>
                                </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function confirmationDeleteComment()
        {
            if(confirm("Push OK to delete the comment ")) {
                return true;
            }else{
                return false;
            }
        }
    </script>
@endif

