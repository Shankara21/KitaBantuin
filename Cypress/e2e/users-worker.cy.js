describe('Cek Users Worker', () => {
    it('Can create new worker', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Users').click({ force: true })
        cy.get('div[id=admin]').click({ force: true })

        cy.get('a').contains('Add new Worker').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/admin/create')

        cy.get('input[name=name]').type('Mamay')
        cy.get('input[name=email]').type('Mamay@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('select[name=gender]').select('Perempuan')
        cy.get('input[name=phone]').type('1230912873091')
        cy.get('input[name=bank_account]').type('2901379018273')
        cy.get('input[name=photo]').selectFile('cypress/fixtures/keycaps_1.jpg')
        cy.get('textarea[name=address]').type('lowokwaru')

        cy.get('button').contains('Send').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/workers')
        cy.get('img').should('contain', 'keycaps_1.jpg')
    })

    it('Can access detail', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Users').click({ force: true })
        cy.get('div[id=admin]').click({ force: true })

        cy.get('button[id=dots_vertical]').click({ multiple: true, force: true })
        cy.get('a').contains('Details').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/workers/4')

        cy.get('a').contains('Kembali').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/workers')
    })

    it('Can edit worker', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Users').click({ force: true })
        cy.get('div[id=admin]').click({ force: true })

        cy.get('button[id=dots_vertical]').click({ multiple: true, force: true })
        cy.get('a').contains('Edit').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/workers/4/edit')

        cy.get('input[name=name]').clear()
        cy.get('input[name=name]').type('Worker123')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=phone]').type('1230912873091')
        cy.get('input[name=bank_account]').type('2901379018273')
        cy.get('textarea[name=address]').type('lowokwaru')
        cy.get('input[name=photo]').selectFile('cypress/fixtures/keycaps_1.jpg')
        cy.get('button').contains('Send').click({ force: true })


        cy.get('file[id=image]').should('contain', 'keycaps_1.jpg')

    })

    it('Can delete worker', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Users').click({ force: true })
        cy.get('div[id=admin]').click({ force: true })

        cy.get('button[id=dots_vertical]').click({ multiple: true, force: true })
        cy.get('button').contains('Delete').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/workers')

    })
})