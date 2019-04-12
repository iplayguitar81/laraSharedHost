<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraVue</title>

    <!-- Fonts -->


    <!-- Styles -->


    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
</head>
<body>

<div id="app">

    <div class="container">
        <articles>

        </articles>

    </div>


</div>


<script>



    const app = new Vue({
        el: '#app'
    });

//    require('/js/components/Articles.vue');
    Vue.component('example-component', require('/js/components/Articles.vue').default);

</script>
</body>
</html>