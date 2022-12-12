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


    it('Can create account bank admin - name number only', () => {
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

        cy.get('input[id=name]').type('99999999')
        cy.get('input[id=image]').selectFile('cypress/fixtures/keycaps_1.jpg')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })


    it('Can create account bank admin - name symbol only', () => {
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

        cy.get('input[id=name]').type('%%%%%%%%%%%%%%')
        cy.get('input[id=image]').selectFile('cypress/fixtures/keycaps_1.jpg')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })


    it('Can create account bank admin - name required', () => {
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

        cy.get('input[id=name]')
        cy.get('input[id=image]').selectFile('cypress/fixtures/keycaps_1.jpg')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })


    it('Can create account bank admin - without add image', () => {
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
        cy.get('input[id=image]')

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

        cy.get('input[id=name]').clear()
        cy.get('input[id=name]').type('Shopeepay123')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })



    it('Can edit bank name user - Number only', () => {
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

        cy.get('input[id=name]').clear()
        cy.get('input[id=name]').type('99999999999')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })



    it('Can edit bank name user - With Symbol Only', () => {
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

        cy.get('input[id=name]').clear()
        cy.get('input[id=name]').type('##############')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })

    it('Can edit bank name user - Required Name', () => {
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

        cy.get('input[id=name]').clear()
        cy.get('input[id=name]')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })

    it('Can edit bank name user - 1 Font only', () => {
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

        cy.get('input[id=name]').clear()
        cy.get('input[id=name]').type('A')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank-user')
    })


    it('Can edit bank name user - With same value', () => {
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

        cy.get('input[id=name]').clear()
        cy.get('input[id=name]').type('##############')
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
        cy.url().should('contain', 'http://localhost:8000/bank-user/gopay/edit')

        cy.get('input[id=image]').selectFile('cypress/fixtures/keycaps_1.jpg')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })
    })

    it('Can edit bank image user - with pdf file', () => {
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

        cy.get('input[id=image]').selectFile('cypress/fixtures/test_1.pdf')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })
    })


    it('Can edit bank image user - with ppt file', () => {
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

        cy.get('input[id=image]').selectFile('cypress/fixtures/test_1.ppt')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })
    })

    it('Can edit bank image user - with zip file', () => {
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

        cy.get('input[id=image]').selectFile('cypress/fixtures/test_1.zip')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })
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
