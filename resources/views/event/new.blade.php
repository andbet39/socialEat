@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
          <div class="panel-body">
                    <form action='/event/save' method='post'>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name='title' placeholder="Enter event title">
                      </div>
                       <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" name='description' rows="3"></textarea>                    </div>
                      <button type="submit" class="btn btn-success">Crea</button>
                    </form>
                    </div>
			</div>
		</div>
	</div>
</div>
@endsection
