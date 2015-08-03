<table class="table">
    <thead>
    <th>Name</th>
			<th>Filename</th>
			<th>Utf8 Filename</th>
			<th>Seq</th>
			<th>Path</th>
			<th>Is Display</th>
			<th>Page Id</th>
			<th>Album Id</th>
			<th>Title Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($photos as $photo)
        <tr>
            <td>{!! $photo->name !!}</td>
			<td>{!! $photo->filename !!}</td>
			<td>{!! $photo->utf8_filename !!}</td>
			<td>{!! $photo->seq !!}</td>
			<td>{!! $photo->path !!}</td>
			<td>{!! $photo->is_display !!}</td>
			<td>{!! $photo->page_id !!}</td>
			<td>{!! $photo->album_id !!}</td>
			<td>{!! $photo->title_id !!}</td>
            <td>
                <a href="{!! route('admin.photos.edit', [$photo->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route(admin.photos.delete', [$photo->id]) !!}" onclick="return confirm('Are you sure wants to delete this Photo?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
