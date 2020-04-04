<!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form method="post" action="{{ route('tudeme.basic.search') }}" autocomplete="off"  class="search-model-form">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" id="search-input" name="name" placeholder="Recipe">
                    </div>
                </div>
                <br>
                <button class="btn-block" type="submit">Search</button>
			</form>
		</div>
	</div>
	<!-- Search model end -->
