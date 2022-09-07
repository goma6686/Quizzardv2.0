<table class="table border-dark table-light">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Question count</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        @if ($loop->first) @continue @endif
            <tr scope="row">
                <th>{{($loop->index)}}</th>
                <td>
                    {{$category->name}}
                </td>
                <td>
                    {{$category->question_count}}
                </td>
                <td>
                    <form action="/category/delete/{{$category->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr scope="row">
            <th>#</th>
                <form enctype="multipart/form-data" method="POST" action="/category">
                    <td>
                        <input type="text" name="name" class="form-control" required="">
                    </td>
                    <td>
                        @csrf
                    <button type="submit" class="btn btn-sm btn-secondary text-dark">Add</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>