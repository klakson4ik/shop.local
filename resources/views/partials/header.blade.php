<div class="container-fluid bg-primary mb-3" style="height: 150px; position: relative" >
    <div class="row">
{{--        @section('change-currency')--}}
{{--            @include('')--}}
{{--        @show--}}

        @section('auth-reg')
        @show

        @section('search-panel')
        @show

        @section('basket')
        @show
    </div>
    <div class="row">
            @section('main-menu')
                @include('pages.category.main_menu')
            @show
    </div>
</div>


