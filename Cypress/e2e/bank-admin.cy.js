describe('Cek Bank Admin', () => {
    it('Can access detail', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Bank').click({ force: true })
        cy.get('div').contains('Bank Admin').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank')

        cy.get('a').contains('Details').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank/bri')

        cy.get('a').contains('Kembali').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank')
    })

    it('Can delete bank', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Bank').click({ force: true })
        cy.get('div').contains('Bank Admin').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank')

        cy.get('button').contains('Delete').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank')
    })

    it('Can create account bank admin', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Bank').click({ force: true })
        cy.get('div').contains('Bank Admin').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank')

        cy.get('a').contains('Add new Bank Admin').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/bank/create')

        cy.get('input[id=name]').type('Bank ku')
        cy.get('input[id=account_name]').type('PT. Jaya')
        cy.get('input[id=account_number]').type('1234567890')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })


})