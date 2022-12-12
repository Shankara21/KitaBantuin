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
        cy.url().should('contain', 'http://localhost:8000/bank/5')
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

    it('create account bank admin -  name with number only', () => {
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

        cy.get('input[id=name]').type('2041720005 2041720005')
        cy.get('input[id=account_name]').type('PT. Jaya')
        cy.get('input[id=account_number]').type('1234567890')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })


    it('create account bank admin -  Account name with number only', () => {
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

        cy.get('input[id=name]').type('Bank Plencit')
        cy.get('input[id=account_name]').type('2041720005 2041720005')
        cy.get('input[id=account_number]').type('1234567890')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })

    it('create account bank admin - account number with abjad', () => {
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

        cy.get('input[id=name]').type('Bank Blink 182')
        cy.get('input[id=account_name]').type('PT. Jaya')
        cy.get('input[id=account_number]').type('judhamaygustya')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })

    it('Can create account bank admin - Name Require', () => {
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

        cy.get('input[id=name]')
        cy.get('input[id=account_name]').type('PT. Jaya')
        cy.get('input[id=account_number]').type('1234567890')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })

    it('Can create account bank admin - Account Name Require', () => {
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
        cy.get('input[id=account_name]')
        cy.get('input[id=account_number]').type('1234567890')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })



    it('Can create account bank admin - Account Number Require', () => {
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
        cy.get('input[id=account_number]')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })


    it('Can create account bank admin - All Require', () => {
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

        cy.get('input[id=name]')
        cy.get('input[id=account_name]')
        cy.get('input[id=account_number]')
        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/bank')
    })
})
