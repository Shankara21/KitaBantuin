describe('Cek Project Result', () => {
    it('Can access list project result', () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Project').click({ force: true })
        cy.get('div').contains('Project Result').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/result')
    })
})
