// vite.config.js
import { defineConfig } from "vite";

export default defineConfig({
  base: "./", // <-- КЛЮЧЕВОЙ МОМЕНТ! Делает все пути относительными
  build: {
    outDir: "dist", // папка для сборки (по умолчанию и так dist)
    assetsDir: "assets", // папка для ассетов внутри dist (по умолчанию assets)
    rollupOptions: {
      input: {
        main: "index.html", // твой входной файл
      },
    },
  },
  // Если используешь SCSS
  css: {
    preprocessorOptions: {
      scss: {
        // дополнительные опции SCSS если нужны
      },
    },
  },
});
