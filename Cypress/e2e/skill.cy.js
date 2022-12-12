describe('Cek Skill', () => {
    it('Can create new skill', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Skill').click({ force: true })

        cy.get('a').contains('Add new Skills').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/skill/create')

        cy.get('input[name=name]').type('Spring Boot')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/skill')
    })

    it('Can create new skill - With Same Value', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Skill').click({ force: true })

        cy.get('a').contains('Add new Skills').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/skill/create')

        cy.get('input[name=name]').type('Spring Boot')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/skill')
    })



    it('Can create new skill - number only', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Skill').click({ force: true })

        cy.get('a').contains('Add new Skills').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/skill/create')

        cy.get('input[name=name]').type('99999999999999999999')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/skill')
    })

    it('Can create new skill - Symbol only', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Skill').click({ force: true })

        cy.get('a').contains('Add new Skills').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/skill/create')

        cy.get('input[name=name]').type('!@#$%^&*()_+')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/skill')
    })

    it('Can create new skill - Required Name Skill', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Skill').click({ force: true })

        cy.get('a').contains('Add new Skills').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/skill/create')

        cy.get('input[name=name]')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/skill')
    })

    it('Can edit skill', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Skill').click({ force: true })

        cy.get('td').contains('Edit').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/skill/php/edit')

        cy.get('input[name=name]').clear()
        cy.get('input[name=name]').type('TEST')

        cy.get('button').contains('Send').click({ force: true })
        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/skill')
    })

    it('Can delete skill', () => {
        cy.visit("http://localhost:8000/login");

        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click({ force: true })
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click({ force: true })
        cy.get('div').contains('Skill').click({ force: true })

        cy.get('button').contains('Delete').click({ force: true })

        cy.get('button').contains('OK').click({ force: true })

        cy.url().should('contain', 'http://localhost:8000/skill')
    })
})
