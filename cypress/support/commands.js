Cypress.Commands.add('login', (email, password) => {
    cy.request({
      method: 'POST',
      url: '/login', // Substitua pela rota correta de login
      body: {
        email: email,
        password: password,
      },
    }).then((response) => {
      // Caso seja necessário armazenar algum tipo de token ou sessionStorage
      window.localStorage.setItem('auth_token', response.body.token);
      // Ou redirecionar para uma página específica
      cy.visit('/dashboard'); // Substitua pela página de destino após o login
    });
  });
  