describe('Sub Category', () => {

    it("Open Sub Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

    });


    it("Create Sub Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Add new SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories/create')

        cy.get('input[name=name]').type('Arc')
        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

    });
    it("Create Sub Category - Same Sub Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Add new SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories/create')

        cy.get('input[name=name]').type('Arc')
        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

    });

    it("Create Sub Category - Regired Name Sub Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Add new SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories/create')

        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

    });

    it("Create Sub Category - Name Required", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Add new SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories/create')

        cy.get('input[name=name]')
        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

    });


    it("Edit Sub Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Edit').click()
        cy.get('a').contains('Kembali').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Edit').click()
        cy.get('input[name=name]').type('php8')
        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')



    });

    it("Edit Sub Category - Require Name Sub Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Edit').click()
        cy.get('a').contains('Kembali').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Edit').click()
        cy.get('input[name=name]')
        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')



    });

    it("Create Sub Category - Same Sub Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('a').contains('Add new SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories/create')

        cy.get('input[name=name]').type('9999999999999999999999999')
        cy.get('button').contains('Send').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

    });


    it("Delete Category", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

        cy.get('button').contains('Delete').click()
        cy.url().should('eq', 'http://localhost:8000/subCategories')
    });
})
