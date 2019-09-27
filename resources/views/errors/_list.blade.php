@if( $errors->any())
	{{-- <div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div> --}}
	<script>
			$.notify(
				 {
				@foreach($errors->all() as $error)
				   message: "{{$error}}",
				@endforeach
				 },
				 {
				   type: "secondary",
				 },
			   )
			</script>
@endif
 @if (session('success'))
	 {{-- <div class="alert alert-success">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <i class="fa fa-check-circle"></i> {!! session('success') !!}
	 </div> --}}
	 <script>
	 $.notify(
          {
            message: '{!! session("success") !!}',
          },
          {
            type: 'success',
          },
        )
	 </script>
 @elseif (session('warning'))
	 {{-- <div class="alert alert-warning">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <i class="fa fa-warning"></i> {!! session('warning') !!}
	 </div> --}}
	 <script>
			$.notify(
				 {
				   message: '{!! session("warning") !!}',
				 },
				 {
				   type: 'warning',
				 },
			   )
			</script>
 @elseif (session('error'))
	 {{-- <div class="alert alert-danger">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <i class="fa fa-warning"></i> {!! session('error') !!}
	 </div> --}}
	 <script>
			$.notify(
				 {
				   message: "{!! session('error') !!}",
				 },
				 {
				   type: "danger",
				 },
			   )
			</script>
 @elseif (session('status'))
	 {{-- <div class="alert alert-success">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <i class="fa fa-check-circle"></i> {!! session('status') !!}
	 </div> --}}
	 <script>
			$.notify(
				 {
				   message: "{!! session('status') !!}",
				 },
				 {
				   type: "info",
				 },
			   )
			</script>
 @endif