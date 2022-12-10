describe('Cek Bank User', () => {
    it('Can create account bank admin', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Bank').click({ force: true })
        cy.get('div').contains('Bank User').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank-user')

        cy.get('a').contains('Add New Bank User').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank-user/create')

        cy.get('input[id=name]').type('Punyaku')
        cy.get('input[id=image]').selectFile('cypress/fixtures/keycaps_1.jpg')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })

    it('Can edit bank name user', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Bank').click({ force: true })
        cy.get('div').contains('Bank User').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank-user')

        cy.get('a').contains('Edit').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank-user/punyaku/edit')

        cy.get('input[id=name]').clear()
        cy.get('input[id=name]').type('Shopeepay123')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })

    it('Can edit bank image user', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Bank').click({ force: true })
        cy.get('div').contains('Bank User').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank-user')

        cy.get('a').contains('Edit').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank-user/shopeepay/edit')

        cy.get('input[id=image]').selectFile('cypress/fixtures/keycaps_1.jpg')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.get('file[id=image]').should('contain', 'keycaps_1.jpg')
    })

    it('Can delete bank user', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Bank').click({ force: true })
        cy.get('div').contains('Bank User').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank-user')

        cy.get('button').contains('Delete').click({ force: true })

        cy.get('button').contains('OK').click({ force: true })
    })
})