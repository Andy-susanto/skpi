<a class='btn btn-xs btn-info' href="{{route('user.edit',$q->id)}}"><i class='fa fa-edit'></i> Edit</a> |
<a class='btn btn-xs btn-danger' onclick="confirmation('{{$q->id}}')"><i class='fa fa-trash'></i> Delete</a>
<form action="{{route('user.destroy',$q->id)}}" method='post' id="{{$q->id}}">
<input type='hidden' name='_method' value='DELETE'>
<input type='hidden' name='_token' value='" . csrf_token() . "'>
</form>
