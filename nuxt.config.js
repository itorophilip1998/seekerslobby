export default {
  ssr: false,
  // loading: '~/components/LoadingBar.vue',

  // Global page headers: https://go.nuxtjs.dev/config-head
  router: {
    scrollBehavior: async function(to, from, savedPosition) {
      if (savedPosition) {
        return savedPosition;
      }
      const findEl = async (hash, x = 0) => {
        return (
          document.querySelector(hash) ||
          new Promise(resolve => {
            if (x > 50) {
              return resolve(document.querySelector("#app"));
            }
            setTimeout(() => {
              resolve(findEl(hash, ++x || 1));
            }, 100);
          })
        );
      };

      if (to.hash) {
        let el = await findEl(to.hash);
        if ("scrollBehavior" in document.documentElement.style) {
          return window.scrollTo({ top: el.offsetTop, behavior: "smooth" });
        } else {
          return window.scrollTo(0, el.offsetTop);
        }
      }

      return { x: 0, y: 0 };
    }
  },
  head: {
    title: 'SeekersLobby',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'SeekersLobby',
      name: 'SeekersLobby',
       content: 'SeekersLobby' }
    ],
    link: [
      { rel: 'shortcut icon', type:'image/png', href: 'pp1.png' }
    ]
  },
  pwa: {
    meta: {
      title: 'SeekersLobby',
      author: 'SeekersLobby',
    },
    icon: {
      fileName: 'pp1.png',
    },
    manifest: {
      name: 'SeekersLobby',
      short_name: 'SeekersLobby',
      lang: 'en',
      display:'standalone',
      start_url:'/',
      useWebmanifestExtension: false,
      description:'Job Portal',
      background_color: "#fff",
      theme_color: "#fff",
      splash_pages: "/"
    },
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    "@/assets/bootstrap/css/bootstrap.min.css",
    "@/assets/css/style.css",
    "@/assets/font-awesome/css/font-awesome.css",
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    "@/plugins/app",
    // {src: '~/plugins/flutterwave', ssr: false},
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    // '@nuxtjs/eslint-module',
    // https://go.nuxtjs.dev/stylelint
    // '@nuxtjs/stylelint-module',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    // 'bootstrap-vue/nuxt',
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',
    // https://go.nuxtjs.dev/content
    // '@nuxt/content',
    '@nuxtjs/proxy',
    '@nuxtjs/auth-next',
  ],
  proxy: {
    //  "/api":"https://paddipay.xyz",
    //  "/paystack":"https://api.paystack.com",
  },
  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
      proxy:true,
      proxyHeaders: false,
      credentials: false
  },
  auth: {
    redirect: {
      login: "/signin",
      logout: "/signin",
      home: "/dashboard",
      callback: "/callback"
    },
    strategies: {
        'laravelJWT': {
          scheme: 'refresh',
          url: 'https://seekerslobby.com',
          endpoints: {
            login: { url: "/api/auth/signin", method: "post", propertyName: "access_token" },
            logout: { url: "/api/auth/signout", method: "post" },
            user: { url: "/api/auth/me", method: "get", propertyName: "user" },
            refresh: { url: '/api/auth/refresh', method: 'post' },
          },
          token: {
            property: 'access_token',
            // maxAge: 35791394 * 60
          },
          refreshToken: {
            property: 'refresh_token',
            data: 'refresh_token',
            // maxAge:35791394 * 60
          }

        },
    }
  },
  router: {
    middleware: ['auth']
  },

  // Content module configuration: https://go.nuxtjs.dev/config-content
  content: {},

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}
