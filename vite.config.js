import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';
import dns from 'dns'
import path from 'path'

dns.setDefaultResultOrder('verbatim')

export default ({ mode }) => {
    process.env = {...process.env, ...loadEnv(mode, process.cwd())};

    return defineConfig({
        server: {
            host: process.env.VITE_ENTRYPOINT || 'localhost',
        },
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            viteStaticCopy({
                targets: [
                    {
                        src: 'resources/fonts/*',
                        dest: 'fonts'
                    },
                    {
                        src: 'resources/images/*',
                        dest: 'images'
                    },
                    {
                        src: 'node_modules/@tabler/core/dist/js/tabler.min.js',
                        dest: 'js'
                    },
                    {
                        src: 'node_modules/@tabler/core/dist/css/tabler.min.css',
                        dest: 'css'
                    },
                    {
                        src: 'node_modules/@tabler/core/dist/css/tabler-flags.min.css',
                        dest: 'css'
                    },
                    {
                        src: 'node_modules/@tabler/core/dist/css/tabler-payments.min.css',
                        dest: 'css'
                    },
                    {
                        src: 'node_modules/@tabler/core/dist/css/tabler-vendors.min.css',
                        dest: 'css'
                    },
                    {
                        src: 'node_modules/tom-select/dist/js/tom-select.base.min.js',
                        dest: 'js'
                    },
                    {
                        src: 'node_modules/tom-select/dist/js/tom-select.base.min.js.map',
                        dest: 'js'
                    },
                    {
                        src: 'node_modules/@tabler/icons-webfont/*',
                        dest: 'icons'
                    },
                ]
            })
        ],
        resolve: {
            alias: {
              '~': path.resolve(__dirname, './node_modules'),
            },
        },
    });
}
