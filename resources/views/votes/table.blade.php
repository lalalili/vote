<table class="table">
    <thead>
    <th>Name</th>
			<th>Phone</th>
			<th>Q1</th>
			<th>Q2</th>
			<th>Q3</th>
			<th>Note1</th>
			<th>Note2</th>
			<th>Photo Id</th>
			<th>Album Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($votes as $vote)
        <tr>
            <td>{!! $vote->name !!}</td>
			<td>{!! $vote->phone !!}</td>
			<td>{!! $vote->q1 !!}</td>
			<td>{!! $vote->q2 !!}</td>
			<td>{!! $vote->q3 !!}</td>
			<td>{!! $vote->note1 !!}</td>
			<td>{!! $vote->note2 !!}</td>
			<td>{!! $vote->photo_id !!}</td>
			<td>{!! $vote->album_id !!}</td>
            <td>
                <a href="{!! route('admin.votes.edit', [$vote->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('admin.votes.delete', [$vote->id]) !!}" onclick="return confirm('Are you sure wants to delete this Vote?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
