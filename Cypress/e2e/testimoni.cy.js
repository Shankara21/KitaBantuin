describe('Cek Testimoni', () => {
    it('Can access list testimoni', () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Testimoni').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/testimoni')
    })

    it('Can delete testimoni', () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Testimoni').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/testimoni')

        cy.get('button').contains('Delete').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/testimoni')

    })
})
