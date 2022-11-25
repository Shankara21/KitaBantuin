describe("Menu Dashboard", () => {
    it("Open Dashboard", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('a').contains('Dashboard').click()
    });

    it("Open Homepage", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('a').contains('Homepage').click()
        cy.url().should('contain', 'http://localhost:8000')
    });

    it("Access Categories", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('Category').click()
        cy.url().should('contain', 'http://localhost:8000/categories')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Categories').click()
        cy.get('div').contains('SubCategory').click()
        cy.url().should('contain', 'http://localhost:8000/subCategories')

    });

    it("Access Users", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Users').click()
        cy.get('div').contains('Admin').click()
        cy.url().should('contain', 'http://localhost:8000/admin')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Users').click()
        cy.get('div').contains('Worker').click()
        cy.url().should('contain', 'http://localhost:8000/workers')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Users').click()
        cy.get('div[id=user]').click()
        cy.url().should('contain', 'http://localhost:8000/user')
    });

    it("Access Skill", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Skill').click()
        cy.url().should('contain', 'http://localhost:8000/skill')
    });

    it("Access Project", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Project').click()
        cy.get('div[id=project]').click()
        cy.url().should('contain', 'http://localhost:8000/projects')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Project').click()
        cy.get('div').contains('Project Result').click()
        cy.url().should('contain', 'http://localhost:8000/result')
    });

    it("Access Pembayaran", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Pembayaran').click()
        cy.get('div').contains('Bank').click()
        cy.url().should('contain', 'http://localhost:8000/bank')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Pembayaran').click()
        cy.get('div').contains('Payment').click()
        cy.url().should('contain', 'http://localhost:8000/payment')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Pembayaran').click()
        cy.get('div').contains('Balance').click()
        cy.url().should('contain', 'http://localhost:8000/balance')
    });

    it("Access Testimoni", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Testimoni').click()
        cy.url().should('contain', 'http://localhost:8000/testimoni')
    });

    it("Access Pengajuan", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('i[id=sidebar]').click()
        cy.get('div').contains('Pengajuan').click()
        cy.url().should('contain', 'http://localhost:8000/worker-details')
    });

    it("Logout", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('div[id=avatar]').click()
        cy.get('a').contains('Log Out').click()
        cy.url().should('contain', 'http://localhost:8000')
    });
});
