@include('layouts.header')
<br>
@if( !empty($comments[0]))
    <div class="col-md-10 offset-md-1">
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
                            <td><input type="submit" name="file_delete{{ $comment->id  }}" value="Delete" class="btn btn-primary"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

