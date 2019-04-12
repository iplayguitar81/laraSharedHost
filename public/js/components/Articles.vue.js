Vue.component("articles", {

        template: "<div> <h2>Articles</h2> <div class='card card-body' v-for='article in articles' v-bind:key='article.id'><h3>@{{article.title}}</h3></div></div>",


    }


);
