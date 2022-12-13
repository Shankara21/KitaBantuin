it('Cari Proyek', () =>{
    cy.visit('http://localhost:8000/login')
    cy.get('#email').type('user')
    cy.get('#password').type('123')
    cy.get('.btn-primary').click()
    cy.visit('http://localhost:8000/list-project')
    cy.get('[name="filter_category"]').select('Java')
})