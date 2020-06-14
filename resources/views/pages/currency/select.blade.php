<currency-select-component
    :currencies-data = "{{json_encode($currencies)}}"
    :currency-cookie = "{{json_encode($_COOKIE['Currency']) ?? 'DKK'}}"
>
</currency-select-component>
