@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Action Items</div>

                <div class="panel-body">

                    <h3>Fill action items form:</h3>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					
					@if(Session::has('success'))
						<div class="alert alert-success">{{Session::get('success')}}</div>
					@endif
					@if(Session::has('checkBox'))
						<div class="alert alert-danger">{{Session::get('checkBox')}}</div>
					@endif
					@if(Session::has('duplicate_image'))
						<div class="alert alert-danger">{{Session::get('duplicate_image')}}</div>
					@endif
					 <form method="POST" action="{{url('storeImage')}}" enctype="multipart/form-data"> 
					 {{ csrf_field() }}
					  
					  <div class="form-group">
						<label for="storeid">Poduct name:</label>
						<input type="text" class="form-control" id="name" name="product_name" value="{{old('product_name')}}">
					  </div>
					  <div class="form-group">
						<label for="comment">Comment:</label>
						<textarea class="form-control" rows="5" id="comment" name="comment">{{ old('comment') }}</textarea>
					  </div>
                      <div class="form-group dropdown">
					    <label for="comment">Image category:</label>
						<select name="image_category">
						  <option class="dropdown-item" value="" selected hidden>Select from photo category</option>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    @foreach($photos as $photo)
							<option class="dropdown-item" value="{{ $photo->id }}">{{ $photo->descr }}</option>
							@endforeach
						  </div>  
						</select>
					  </div>
					  <div class="form-group">
						<label for="image">Upload image:</label>
						<input type="file" name="upload_image" class="image" value="">
					  </div>
					  <div class="form-group">
                        <div class="checkbox">
						  <label><input type="checkbox" name="checked" >Done</label>
						</div>   
                      </div>
					  <button type="submit" class="btn btn-default pull-right">Submit</button>
					</form><br><br> 
                    <h3>Display images:</h2><!--<img src="{{asset('../storage/app/public/upload/CZJP4299.jpg')}}" width="50" height="50" alt="">-->
					@foreach($images as $image)
						<img src= "../storage/app/public/upload/{{ $image->image_name }}" alt="" width="100" height="120" class="img-fluid rounded float-left">
					@endforeach
                </div>
            </div>
        </div>
    </div>
	
	<div class="row">
		
	</div>
</div>
@endsection