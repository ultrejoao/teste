import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
    baseUrl: 'http://127.0.0.1:8000', // Defina a URL base para seu projeto Laravel
    setupNodeEvents(on, config) {
      // Implementar ouvintes de eventos do Node, se necessário
    },
  },
});



