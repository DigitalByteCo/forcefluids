<label>Company Name</label>
<select class="form-control" name="company_id">
	@foreach($companies as $c)
	<option value="{{$c->id}}">{{$c->name}}</option>
	@endforeach
</select>