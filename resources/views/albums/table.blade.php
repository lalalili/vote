<table class="table">
    <thead>
    <th>Name</th>
			<th>Note</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($albums as $album)
        <tr>
            <td>{!! $album->name !!}</td>
			<td>{!! $album->note !!}</td>
            <td>
                <a href="{!! route('admin.albums.edit', [$album->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('admin.albums.delete', [$album->id]) !!}" onclick="return confirm('Are you sure wants to delete this Album?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
