import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  title: "Testing site",
  description: "A testing vitepress site",
  base: '/docs/',
  // lastUpdated: true, // <- perlu package git dlm npm (malas setup di docker)
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
      message: 'Testing messages.',
      copyright: 'Copyright © 2025 by ryanBajindul'
    }
  }
})

