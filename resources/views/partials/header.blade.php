<div class="container-fluid bg-primary mb-3" style="height: 150px; position: relative" >
    <div class="row">
        @section('change-currency')
            @include('pages.currency.select')
        @show
    </div>

        @section('auth-reg')
            @include('pages.people.index')
        @show

        @section('search-panel')
            @include('pages.search.generalSearch')
        @show

        @section('basket')
        @show

    <div class="row">
            @section('main-menu')
                @include('pages.category.main_menu')
            @show
    </div>
</div>


