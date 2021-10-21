@if(count($model->uploads) > 0)
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
	
	@foreach ($model->uploads as $upload)
		<?php $extension = pathinfo(route('upload.file', ['disk' => $disk , 'filename' => $upload->path]) )['extension'] ?>
		@if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'jpeg' || $extension == 'bmp' || $extension == 'webp' || $extension == 'svg')
		<div class="col mb-5">
			<div class="card h-100">
				@include('includes.acciones', ['disk' => $disk, 'filename' => $upload->path])
				
				<!-- Product image-->
				<img class="card-img-top"  src="{{ route('upload.file', ['disk' => $disk , 'filename' => $upload->path])   }}" alt="...">

				<!-- Product actions-->
				<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
					<p class="text-center">-Imagen Recursiva-</p>
					<p class="text-center">{{str_replace($extension, '', $upload->path)}}</p>
					<div class="text-center"><a class="btn btn-outline-dark mt-auto" target="_blank" href="{{ route('upload.file', ['disk' => $disk , 'filename' => $upload->path])   }}">ver</a></div>
				</div>
			</div>
		</div>
		@elseif($extension == 'pdf')
			<div class="col mb-5">
				<div class="card h-100">
					@include('includes.acciones', ['disk' => $disk, 'filename' => $upload->path])
					<!-- Product image-->
					<img class="card-img-top" src="{{ asset('img/uploads/pdf.jfif')  }}" alt="...">

					<!-- Product actions-->
					<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<p class="text-center">-Recurso pdf-</p>
						<p class="text-center">{{str_replace($extension, '', $upload->path)}}</p>
						<div class="text-center"><a class="btn btn-outline-dark mt-auto"href="{{ route('upload.file', ['disk' => $disk , 'filename' => $upload->path])   }}" target="_blank"">ver</a></div>
					</div>
				</div>
			</div>
		{{-- <a href="{{ route('upload.file', ['disk' => $disk , 'filename' => $upload->path])   }}" target="_blank">ver pdf</a> --}}
		@elseif ($extension == 'doc'|| $extension == 'docx')
			<div class="col mb-5">
				<div class="card h-100">
					@include('includes.acciones', ['disk' => $disk, 'filename' => $upload->path])
					<!-- Product image-->
					<img class="card-img-top" src="{{ asset('img/uploads/word.png') }}" alt="...">

					<!-- Product actions-->
					<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<p class="text-center">-Documento word-</p>
						<p class="text-center">{{str_replace($extension, '', $upload->path)}}</p>
						<div class="text-center"><a class="btn btn-outline-dark mt-auto"href="{{ route('upload.file', ['disk' => $disk , 'filename' => $upload->path])   }}" >descargar</a></div>
					</div>
				</div>
			</div>
		@elseif ($extension == 'ppt'|| $extension == 'pttx')
			<div class="col mb-5">
				<div class="card h-100">
					@include('includes.acciones', ['disk' => $disk, 'filename' => $upload->path])
					<!-- Product image-->
					<img class="card-img-top" src="{{ asset('img/uploads/power-point.png') }}" alt="...">

					<!-- Product actions-->
					<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<p class="text-center">-Archivo de Presentacion-</p>
						<p class="text-center">{{str_replace($extension, '', $upload->path)}}</p>
						<div class="text-center"><a class="btn btn-outline-dark mt-auto"href="{{ route('upload.file', ['disk' => $disk , 'filename' => $upload->path])   }}" >descargar</a></div>
					</div>
				</div>
			</div>
		@elseif ($extension == 'txt')
			<div class="col mb-5">
				<div class="card h-100">
					@include('includes.acciones', ['disk' => $disk, 'filename' => $upload->path])
					<!-- Product image-->
					<img class="card-img-top" src="{{ asset('img/uploads/archivo-txt.png') }}" alt="...">

					<!-- Product actions-->
					<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<p class="text-center">-Archivo de Texto-</p>
						<p class="text-center">{{str_replace($extension, '', $upload->path)}}</p>
						<div class="text-center"><a class="btn btn-outline-dark mt-auto"href="{{ route('upload.file', ['disk' => $disk , 'filename' => $upload->path])   }}" >descargar</a></div>
					</div>
				</div>
			</div>
		@endif
	@endforeach
</div>
@endif