@if($model->uploads)
	<a href="{{ route('profile', ['id' => \Auth::user()->id]) }}">
		<img  src="{{ route('user.avatar', ['filename' => Auth::user()->image]) }}">
	</a>
@endif