Vue.component("articles", {

    //props: ['articles'],
    template: '<div> <h2>Articles</h2><div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id"><h3>{{article.title}}</h3><p>{{ article.body }}</p></div></div>',

    props: {
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
            //console.log(res.data);
        })
        }
    },

                        }



            );
