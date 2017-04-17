    <div class="container">
       @if(!Auth::check())
    		<div class"row">
    			<div class='col-md-12 col-md-offset-3' style="text-align: center;">
					<p class='col-md-3' style='padding-top: 5px;'>¿Tienes una tienda de reposteria?</p>
					<a class="btn btn-default col-md-3" href="{{ route('singuppagetienda')}}" role="button">Mas Información</a>
    			</div>
    		</div>
		@endif
    </div>
