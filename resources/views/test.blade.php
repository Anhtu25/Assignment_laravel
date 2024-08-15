<form action="{{ route('postTest') }}" method="post" enctype="multipart/form-data" >
@csrf
<input type="file"><br>
<button type="submit">Add</button>
</form>
