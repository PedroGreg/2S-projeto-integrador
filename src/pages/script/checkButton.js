let check = document.querySelectorAll('.check');
let checkall = document.getElementById('checkall');
check.forEach((check) => {

    check.addEventListener('click', () => {
        if (check.classList.contains('chamados-button')) {
            check.classList.replace('chamados-button', 'chamados-button-clicked');
        } else if (check.classList.contains('chamados-button-clicked')) {
            check.classList.replace('chamados-button-clicked', 'chamados-button');
        }
        if (check.classList.contains('chamados-button')) {
            checkall.classList.replace('chamados-button-clicked', 'chamados-button');
        }
    })
});
checkall.addEventListener('click', clickall())
function clickall() {
    checkall.addEventListener('click', () => {
        if (checkall.classList.contains('chamados-button')) {
            checkall.classList.replace('chamados-button', 'chamados-button-clicked');
            check.forEach((check) => {
                check.classList.replace('chamados-button', 'chamados-button-clicked');
            })

        } else if (checkall.classList.contains('chamados-button-clicked')) {
            checkall.classList.replace('chamados-button-clicked', 'chamados-button');
            check.forEach((check) => {
                check.classList.replace('chamados-button-clicked', 'chamados-button');
            })
        }
    })
}
