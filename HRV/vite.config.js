import { defineConfig, createLogger } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';

const logger = createLogger();
const originalWarn = logger.warn.bind(logger);
logger.warn = (msg, options) => {
    if (msg.includes('PLUGIN_TIMINGS')) return;
    originalWarn(msg, options);
};

// Custom copy plugin - skips missing folders
function copyResourcesPlugin() {
    return {
        name: 'copy-resources',
        closeBundle() {
            const targets = [
                { src: 'resources/css',     dest: 'public/build/css'     },
                { src: 'resources/scss',    dest: 'public/build/scss'    },
                { src: 'resources/img',     dest: 'public/build/img'     },
                { src: 'resources/js',      dest: 'public/build/js'      },
                { src: 'resources/fonts',    dest: 'public/build/fonts'    },
                { src: 'resources/plugins', dest: 'public/build/plugins' },
            ];

            for (const target of targets) {
                if (!fs.existsSync(target.src)) {
                    console.log(`[copy-resources] Skipped (not found): ${target.src}`);
                    continue;
                }
                copyDirSync(target.src, target.dest);
                console.log(`[copy-resources] Copied: ${target.src} → ${target.dest}`);
            }
        }
    };
}

function copyDirSync(src, dest) {
    fs.mkdirSync(dest, { recursive: true });
    for (const entry of fs.readdirSync(src, { withFileTypes: true })) {
        const srcPath  = path.join(src, entry.name);
        const destPath = path.join(dest, entry.name);
        if (entry.isDirectory()) {
            copyDirSync(srcPath, destPath);
        } else {
            fs.copyFileSync(srcPath, destPath);
        }
    }
}

export default defineConfig({
    customLogger: logger,
    build: {
        manifest: true,
        outDir: 'public/build/',
        cssMinify: false,
        minify: false,
        rollupOptions: {
            output: {
                assetFileNames: (asset) => {
                    const name = asset.names?.[0] ?? asset.name ?? '';
                    if (name && name.split('.').pop() === 'css') {
                        return 'css/' + name;
                    } else if (name) {
                        return 'icons/' + name;
                    }
                    return 'assets/[name][extname]';
                },
                entryFileNames: 'js/[name].js',
            },
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/style.css', 'resources/js/script.js'],
            refresh: true,
        }),
        copyResourcesPlugin(),
    ],
});