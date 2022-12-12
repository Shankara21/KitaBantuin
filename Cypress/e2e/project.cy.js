describe('Cek Project', () => {
    it('Can accept list projects', () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Project').click({ force: true })
        cy.get('div[id=project]').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/projects')

        cy.get('button').contains('Accept').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })
    })

    it('Can access detail projects', () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Project').click({ force: true })
        cy.get('div[id=project]').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/projects')

        cy.get('button').contains('Details').click({ force: true })

        cy.get('h5').contains('Detail').should('be.visible')
    })

    it('Can delete projects', () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Project').click({ force: true })
        cy.get('div[id=project]').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/projects')

        cy.get('button').contains('Delete').click({ force: true })

        cy.get('button').contains('OK').click({ force: true })
    })
})
