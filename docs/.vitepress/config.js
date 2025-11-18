import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: "Guide",
  description: "Tuntunan menggunakan aplikasi",
  base: '/docs/',
  // rewrites: {
  //   'index' : 'markdown-example'
  // },
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    nav: [
      { text: 'Home', link: 'http://localhost:8000', target: '_self' },
      { text: 'Examples', link: '/markdown-examples' }
    ],

    sidebar: [
      {
        text: 'Examples',
        items: [
          { text: 'Markdown Examples', link: '/markdown-examples' },
          { text: 'Runtime API Examples', link: '/api-examples' }
        ]
      }
    ],

    footer: {
      message: 'Dirilis pada tahun 2025.',
      copyright: 'Copyright © 2025'
    }
  }
})
