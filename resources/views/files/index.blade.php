@include('layouts.header')
<br>
<style type="text/css">
    #delete:hover {
        background-color: red;
        border: red;
    }
    .download {
        background-color: #76b852;
        color: #F2F2F2;
    }
    .download:hover {
        background-color: #F2F2F2;
        color: #76b852;
    }
</style>
@if( !empty($files[0]))
<div class="col-md-10 offset-md-1">
    @include('layouts.success')
    <div class="container">
        <table class="table">
            <thead class="text-center">
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Size(bytes)</th>
                <th>Date</th>
                <th>Description</th>
                <th>Download</th>
                @if(auth()->user()->role == 'admin')
                    <th>Delete</th>
                @endif
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($files as $file)
                <tr>
                    <td>{{$user[$file->id]['name']}}</td>
                    <td>{{$file->type}}</td>
                    <td>{{$file->size}}</td>
                    <td>{{$file->created_at}}</td>
                    <td>{{$file->description}}</td>
                    <td>
                        <form action="/upload/file/{{ $file->id }}" method="post">
                            @csrf
                            <button class="btn download">Download</button>
                        </form>
                    </td>
                    @if(auth()->user()->role == 'admin')
                        <td>
                            <form action="/admin/file/{{ $file->id }}" method="post" onsubmit="return confirmationDeleteFile()">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-secondary" id="delete">Delete</button>
                                <div class="notification is-danger">
                                    <ul>
                                    </ul>
                                </div>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
    <script type="text/javascript">
        function confirmationDeleteFile()
        {
            if(confirm("Push OK to delete the file ")) {
                return true;
            }else{
                return false;
            }
        }
    </script>
@endif
