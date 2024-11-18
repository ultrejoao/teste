describe('Logout Test', () => {
    it('should log out successfully', () => {
      // Realiza o login com cy.request
      cy.request({
        method: 'POST',
        url: '/login', // Substitua pela rota correta de login
        body: {
          email: 'Admin@hotmail.com',
          password: 'password',
        },
      }).then((response) => {
        // Armazena o token ou configura o cookie de sessão, dependendo de como a autenticação funciona
        // Se for token, você pode usar:
        // window.localStorage.setItem('auth_token', response.body.token);

        // Se for sessão, o Laravel geralmente lida com isso através de cookies automaticamente,
        // então você pode simplesmente fazer o login via request e o Cypress lidará com a sessão.

        // Redireciona para a página após login
        cy.visit('/dashboard');
      });

      // Verifica se o botão de logout está visível
      cy.get('.logout-button').should('be.visible').click(); // Clica no botão de logout

      // Verifica se o usuário foi redirecionado para a página de login
      cy.url().should('include', '/login');
    });
  });

