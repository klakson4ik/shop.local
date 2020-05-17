<div class="card">
    <a href="/product/<{{$product->alias}}"><img class="card-img-top" src="/images/mobile/{{$product->img}}" alt="Сервер недоступен"></a>
    <div class="card-body">
        <a class="text-decoration-none font-weight-bolder" href="/product/<{{$product->alias}}"><h4 class="card-title">{{$product->title}}</h4></a>
        <p class="card-text">
            Some quick example text to build on the card title
            and make up the bulk of the card's content.
        </p>
        <p class="text-monospace">{{$product->price}}</p>
        <p class="text-black-50">{{$product->old_price}}</p>
        <a href="#!" class="btn btn-dark">Купить</a>
        <a href="#!" class="btn btn-primary">В корзину</a>
    </div>
</div>
