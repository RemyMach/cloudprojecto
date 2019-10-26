@include('layouts.header')
<br>
@if( !empty($files[0]))
<div class="col-md-10 offset-md-1">
    <div class="container">
        <table class="table">
            <thead class="text-center">
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Size</th>
                <th>Created</th>
                <th>comment</th>
                <th>Download</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($files as $file)
                <tr>
                    <td>{{$file->name}}</td>
                    <td>{{$file->type}}</td>
                    <td>{{$file->size}}</td>
                    <td>{{$file->created_at}}</td>
                    <td>{{$file->description}}</td>
                    <td><input type="submit" name="file_download{{ $file->id  }}" value="Download" class="btn btn-primary"></td>
                    <td><input type="submit" name="file_delete{{ $file->id  }}" value="Delete" class="btn btn-primary"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
