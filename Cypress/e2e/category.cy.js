describe('Category', () => {
    it("Create Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('Category').click()
        cy.url().should('contain', 'http://localhost:8000/categories')

        cy.get('a').contains('Add new Category').click()
        cy.url().should('contain', 'http://localhost:8000/categories/create')

        cy.get('input[name=name]').type('DevOps')
        cy.get('button').contains('Send').click()
        cy.get('button').contains('OK').click()
        cy.url().should('contain', 'http://localhost:8000/categories')

    });

    it("Edit Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('Category').click()
        cy.url().should('contain', 'http://localhost:8000/categories')

        cy.get('a').contains('Edit').click()
        cy.get('a').contains('Kembali').click()
        cy.url().should('contain', 'http://localhost:8000/categories')

        cy.get('a').contains('Edit').click()
        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/categories')



    });

    it("Delete Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('Category').click()
        cy.url().should('contain', 'http://localhost:8000/categories')

        cy.get('button').contains('Delete').click()
        cy.url().should('eq', 'http://localhost:8000/categories')
    });
})