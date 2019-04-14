


export default {


    mode: 'history',

    linkActiveClass: 'font-bold',

    routes: [


        {
            path: '*',
            component: NotFound
        },

        {
            path: '/',
            component: Home
        },

        {

            path: '/about',
            component: About
        },

        {

            path: '/logo',
            component: Logo
        },

        {

            path: '/logo-symbol',
            component: LogoSymbol
        },

        {

            path: '/colors',
            component: Colors
        },

        {

            path: '/typography',
            component: Typography
        },

        {

            path: '/mascot',
            component: Mascot
        },

        {

            path: '/illustrations',
            component: Illustrations
        },

        {

            path: '/loaders-and-animations',
            component: LoadersAndAnimations
        },

        {

            path: '/wallpapers',
            component: Wallpapers
        },



    ]
}