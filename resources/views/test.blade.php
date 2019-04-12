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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




</head>
<body>

<div id="app">

    <navbar></navbar>

    <div class="container">

        <articles>

        </articles>


    </div>

</div>

<div id="output">

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script src="/js/components/Articles.vue.js"></script>
<script src="/js/components/Navbar.vue.js"></script>


<script>

    const app = new Vue({
        el: '#app',

        data: {
                articles: [],
                article: {
                    id: '',
                    title: '',
                    body: ''
        },
            article_id: '',
            pagination: {},
            edit: false

        },
        created: function(){ this.fetchArticles();},
        methods: {
           fetchArticles(){
               fetch('api/articles')
                   .then(res => res.json())
               .then(res => {
                   this.articles=res.data;
               })
            }
        },
        template: '<div class="card card-body" v-for="article in articles" v-bind:key="article.id"><h3>{{article.title}}</h3></div>'
    });


    {{--const output = new Vue({--}}
        {{--el: '#output',--}}

        {{--data: {--}}
                {{--articles: [],--}}
                {{--article: {--}}
                    {{--id: '',--}}
                    {{--title: '',--}}
                    {{--body: ''--}}
        {{--},--}}
            {{--article_id: '',--}}
            {{--pagination: {},--}}
            {{--edit: false--}}

        {{--},--}}
        {{--created: function(){ this.fetchArticles();},--}}
        {{--methods: {--}}
           {{--fetchArticles(){--}}
               {{--fetch('api/articles')--}}
                   {{--.then(res => res.json())--}}
               {{--.then(res => {--}}
                   {{--this.articles=res.data;--}}
               {{--})--}}
            {{--}--}}
        {{--},--}}
        {{--template: '<div class="card card-body" v-for="article in articles" v-bind:key="article.id"><h3>{{article.title}}</h3></div>'--}}
    {{--})--}}



</script>


</body>
</html>