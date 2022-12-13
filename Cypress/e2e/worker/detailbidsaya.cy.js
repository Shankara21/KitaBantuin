it('Bid Proyek', () =>{
    cy.visit('http://localhost:8000/login')
    cy.get('#email').type('worker')
    cy.get('#password').type('123')
    cy.get('.btn-primary').click()
    cy.visit('http://localhost:8000/myBid')
    cy.contains('Details').click()
})