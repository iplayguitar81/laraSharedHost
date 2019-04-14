<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaraVue</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>window.Laravel = {csrfToken: '{{csrf_token()}}'}</script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div id="app">

    <navbar></navbar>

    <div class="container">


        <router-link class="text-black" to="/zeppelin">Zeppelin</router-link>
        <router-link class="text-black" to="/about">About</router-link>


        <div class="primary flex-1">

            {{--think of this (router-view) as the yield concept in rails or laravel...--}}
            <router-view> </router-view>

        </div>

        <articles></articles>

        {{--<form @submit.prevent="addArticle()" class="mb-3">--}}
            {{--<div class="form-group">--}}
                {{--<input type="text" class="form-control" placeholder="Title" v-model="article.title">--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<textarea class="form-control" placeholder="Body" v-model="article.body"></textarea>--}}
            {{--</div>--}}

            {{--<button type="submit" class="btn btn-md btn-success">Save</button>--}}
        {{--</form>--}}

        {{--<nav aria-label="Page navigation example">--}}
            {{--<ul class="pagination">--}}
                {{--<li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)">Previous</a></li>--}}

                {{--<li class="page-item disabled"><a class="page-link text-dark" href="#">Page @{{pagination.current_page}} of @{{pagination.last_page }}</a></li>--}}

                {{--<li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">Next</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}

        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>@{{article.title}}</h3>
            <p>@{{ article.body }}</p>
            {{--<hr/>--}}
            {{--<div class="mx-auto">--}}
                {{--<button @click="deleteArticle(article.id)" class="btn btn-md btn-danger">Delete</button>--}}

                {{--<button @click="updateArticle(article)" class="btn btn-md btn-warning">Update</button>--}}
            {{--</div>--}}



        </div>

    </div>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
<script src="/js/routes.js"></script>

<script src="/js/components/Articles.vue.js"></script>
<script src="/js/components/Navbar.vue.js"></script>




<script>


    const app = new Vue({
        el: '#app',

        router: new VueRouter(routes),

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
            fetchArticles(page_url){
                let vm = this;
                page_url = page_url || '/api/articles'
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.articles=res.data;
                        vm.makePagination(res.meta, res.links);
                        //console.log(res.data);
                    })
                    .catch(err => console.log(err));
            },

            makePagination(meta, links){
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }

                this.pagination = pagination;
            },

        },
    });





</script>


</body>
</html>