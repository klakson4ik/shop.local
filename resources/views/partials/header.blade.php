<div class="header">
	<div class="header-currency">
		@include('pages.currency.select')
	</div>
	<div class="header-auth">
		@include('auth.widgets')
	</div>
	<div class="header-search">
		@include('pages.search.generalSearch')
	</div>
	<div class="header-basket">
	@section('basket')
	@show
	</div>
	<div class="header-category">
		@include('pages.category.main_menu')
	</div>
</div>

