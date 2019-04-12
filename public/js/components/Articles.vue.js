

Vue.component("articles", {

    template: '<div> <h2>Articles</h2></div>',


    }


    );





// data: {
//     articles: [],
//         article: {
//         id: '',
//             title: '',
//             body: ''
//     },
//     article_id: '',
//         pagination: {},
//     edit: false
//
// },
// created: function(){ this.fetchArticles();},
// methods: {
//     fetchArticles(){
//         fetch('api/articles')
//             .then(res => res.json())
//     .then(res => {
//             this.articles=res.data;
//     })
//     }
// }