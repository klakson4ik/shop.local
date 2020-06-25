<div class="container-fluid bg-primary mb-3" style="height: 150px; position: relative" >
    <div class="row">
        @section('change-currency')
            @include('pages.currency.select')
        @show
    </div>

        @section('auth-reg')
<<<<<<< HEAD
            @include('pages.people.index')
=======
            @include('auth.widgets')
>>>>>>> 22e21528aa5f4afd497e38d1dec154fb961117b6
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


