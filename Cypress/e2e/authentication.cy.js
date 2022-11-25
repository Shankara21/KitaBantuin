describe("Login", () => {
    it("Admin can login", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')
    });

    it("User can login", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000')
    });

    it("Worker can login", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('worker@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000')
    });

    it("User login failed", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('worker@gmail.com')
        cy.get('input[name=password]').type('judha123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/login')
    });

    it("Email is required", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/login')
    });

    it("Password is required", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/login')
    });

    it("All field is required", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]')
        cy.get('input[name=password]').type('123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/login')
    });
});

describe("Register", () => {
    it("New User can register", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Maygustya')
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]').type('123')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/')
    });

    it("Fullname is required", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]')
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]').type('123')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/register')
    });

    it("email is required", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Maygustya')
        cy.get('input[name=email]')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]').type('123')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/register')
    });

    it("password is required", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Maygustya')
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]').type('123')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/register')
    });

    it("password confirmation is required", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Maygustya')
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/register')
    });

    it("password confirmation must same", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Maygustya')
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]').type('qweertt')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/register')
    });

    it("All field is required", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]')
        cy.get('input[name=email]')
        cy.get('input[name=password]')
        cy.get('input[name=password_confirmation]')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/register')
    });
});