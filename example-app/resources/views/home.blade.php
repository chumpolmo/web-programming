@include('templates.header')
@include('templates.menu')

<div class="container">
<h1>{{ $topic }}</h1>
<p>
	<a href="/create_form" class="btn btn-success">เพิ่มข้อมูลสโมสร</a>
</p>
<p>
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>FC Name</th>
			<th>Logo</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
		@foreach ($fcs as $fc)
		<tr>
			<td>{{ $fc->id }}</td>
			<td>{{ $fc->name }}</td>
			<td><img src="{{ asset($fc->logo) }}" class="img-thumbnail" style="width: 200px;"></td>
			<td>{{ $fc->description }}</td>
			<td>
				<a href="/getfc/{{ $fc->id }}" class="btn btn-primary">Detail</a>
				<button type="button" class="btn btn-warning">Edit</button>
				<button type="button" class="btn btn-danger">Delete</button>
			</td>
		</tr>
		@endforeach
	</table>
</p>
</div>

@include('templates.footer')