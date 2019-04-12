<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraVue</title>

    <!-- Fonts -->


    <!-- Styles -->

    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>window.Laravel = {csrfToken: '{{csrf_token()}}'}</script>



</head>
<body>

<div id="app">

    <div class="container">
        <articles>

        </articles>

    </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script src="/js/components/Articles.vue.js"></script>

<script>

    const app = new Vue({
        el: '#app'
    });

</script>


</body>
</html>