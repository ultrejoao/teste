describe('User Login', () => {
    it('should log in successfully with valid credentials', () => {
      // Visita a página de login
      cy.visit('http://127.0.0.1:8000/login');

      // Preenche o formulário de login
      cy.get('input[name="email"]').type('Admin@hotmail.com');
      cy.get('input[name="password"]').type('password');

      // Submete o formulário de login
      cy.get('button[type="submit"]').click();

      Cypress.on('uncaught:exception', (err, runnable) => {

        return false;
      });
    });
  });

