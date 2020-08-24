<div class="header">
	<div class="currency"
		@section('change-currency')
			 @include('pages.currency.select')
		@show
	</div>
	@section('auth-reg')
		@include('auth.widgets')
	@show

	@section('search-panel')
		@include('pages.search.generalSearch')
	@show

	@section('basket')
	@show

	@section('main-menu')
		@include('pages.category.main_menu')
	@show
</div>

<style>
	.header{
		display: grid;
		grid-template-rows: 1fr 1fr;
		grid-template-columns: 1fr 1fr 1fr;
	}

	.currency{
		
	}
</style>
