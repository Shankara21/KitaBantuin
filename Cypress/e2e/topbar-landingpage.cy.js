describe("Topbar Landing Page", () => {

    it("Open login Page", () => {
        cy.visit("http://localhost:8000/");
        cy.visit("http://localhost:8000/login");
    });

    it("Open List Project Page", () => {
        cy.visit("http://localhost:8000/");
        cy.visit("http://localhost:8000/list-project");
    });

    it("Open List Worker Page", () => {
        cy.visit("http://localhost:8000/");
        cy.visit("http://localhost:8000/list-worker");
    });

    it("Open Service Page", () => {
        cy.visit("http://localhost:8000/");
        cy.visit("http://localhost:8000/service");
    });

    it("Open About Page", () => {
        cy.visit("http://localhost:8000/");
        cy.visit("http://localhost:8000/about");
    });

    it("Open Contact Page", () => {
        cy.visit("http://localhost:8000/");
        cy.visit("http://localhost:8000/contact");
    });

});
