@if($model->uploads)
	{{-- <a href="{{  }}">
		<img  src="{{  \Helper::uploads($model)   }}">
	</a> --}}
	{{-- @dump($model->uploads) --}}
	@foreach ($model->uploads as $upload)
		<?php $extension = pathinfo(route('home.file', ['disk' => 'challenge', 'filename' => $upload->path]) )['extension'] ?>
		@if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' ||)
			<img  src="{{ route('home.file', ['disk' => 'challenge', 'filename' => $upload->path])   }}">
		@else
			
		@endif
		@dump( $extension )
		
	@endforeach
@endif