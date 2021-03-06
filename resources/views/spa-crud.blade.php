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

    <h1 class="text-center">Welcome {{$user_name}}</h1>
    <div class="container">

        <articles></articles>


        <form @submit.prevent="addArticle()" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" v-model="article.title">
            </div>

            <div class="form-group">
                <textarea class="form-control" placeholder="Body" v-model="article.body"></textarea>
            </div>

            <button type="submit" class="btn btn-md btn-success">Save</button>
        </form>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)">Previous</a></li>

                <li class="page-item disabled"><a class="page-link text-dark" href="#">Page @{{pagination.current_page}} of @{{pagination.last_page }}</a></li>

                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>

        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>@{{article.title}}</h3>
            <p>@{{ article.body }}</p>
        <hr/>
            <div class="mx-auto">
                <button @click="deleteArticle(article.id)" class="btn btn-md btn-danger">Delete</button>

                <button @click="updateArticle(article)" class="btn btn-md btn-warning">Update</button>
            </div>



        </div>

    </div>

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

            deleteArticle(id) {
                if(confirm('Are You Sure?')){
                    fetch('api/article/'+id, {
                      method: 'delete'
                    })
                    .then(res => res.json())
                    .then(data => {
                      alert('Article Deleted');
                      this.fetchArticles();
                    })
                        .catch(err => console.log(err));
                }
            },

            addArticle() {
                if(this.edit === false) {
                   //Add
                    fetch('api/article', {
                       method: 'post',
                       body: JSON.stringify(this.article),
                       headers: {
                           'content-type': 'application/json'
                       }

                    })
                        .then(res => res.json())
                        .then(data => {
                            this.article.title ='';
                            this.article.body='';
                            alert('Article Created');
                            this.fetchArticles();
                    })
                        .catch(err => console.log(err));
                }
                else {
                    //Update
                    fetch('api/article', {
                        method: 'put',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type': 'application/json'
                        }

                    })
                        .then(res => res.json())
                .then(data => {
                        this.article.title ='';
                    this.article.body='';
                    alert('Article Updated!');
                    this.fetchArticles();
                })
                .catch(err => console.log(err));

                    }
            },

            updateArticle(article){
                this.edit = true;
                this.article.id = article.id;
                this.article.article_id = article.id;
                this.article.title = article.title;
                this.article.body = article.body;

            }


        },
    });





</script>


</body>
</html>