describe("Login", () => {

    it("Open login Page", () => {
        cy.visit("http://localhost:8000/login");
    });

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

    it("Wrong Email", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('ngawur@gmail.com')
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

    it("User login failed - Wrong Password", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('worker@gmail.com')
        cy.get('input[name=password]').type('judha123')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/login')
    });

    it("User login failed - Email Invalid", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]').type('worker')
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
        cy.get('input[name=email]').type('worker@gmail.com')
        cy.get('input[name=password]')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/login')
    });

    it("All field is required", () => {
        cy.visit("http://localhost:8000/login");
        cy.get('input[name=email]')
        cy.get('input[name=password]')
        cy.get('button').contains('Sign in').click()
        cy.url().should('contain', 'http://localhost:8000/login')
    });
});

describe("Register", () => {

    it("Open register page", () => {
        cy.visit("http://localhost:8000/register");
    });

    it("New User can register but the password is full number", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Test')
        cy.get('input[name=email]').type('judha1111@gmail.com')
        cy.get('input[name=password]').type('1236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666123666666666666666666666666666666666666666666666666661236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666123666666666666666666666666666666666666666666666666661236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666123666666666666666666666666666666666666666666666666661236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666')
        cy.get('input[name=password_confirmation]').type('1236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666123666666666666666666666666666666666666666666666666661236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666123666666666666666666666666666666666666666666666666661236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666123666666666666666666666666666666666666666666666666661236666666666666666666666666666666666666666666666666612366666666666666666666666666666666666666666666666666')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/')
    });

    it("New User can't register - Email Has Already ben taken", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Maygustya')
        cy.get('input[name=email]').type('judha@gmail.com')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]').type('123')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/')
    });

    it("New User can't register - Email invalid", () => {
        cy.visit("http://localhost:8000/register");
        cy.get('input[name=name]').type('Judha Maygustya')
        cy.get('input[name=email]').type('judha')
        cy.get('input[name=password]').type('123')
        cy.get('input[name=password_confirmation]').type('123')
        cy.get('button').contains('Sign up').click()
        cy.url().should('contain', 'http://localhost:8000/')
    });

    it("Name is required", () => {
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
        cy.get('input[name=password]')
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
