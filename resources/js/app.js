import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.delete-project');

deleteButtons.forEach((deleteButton) => {
    deleteButton.addEventListener('click',(event) =>{
        event.preventDefault();

        let modalUsed = document.getElementById('modale');

        const newModal = new bootstrap.Modal(modalUsed);

        newModal.show();

        const confirmDeleteButton = document.querySelector('.confirm-delete-button');

        confirmDeleteButton.addEventListener('click', () =>{
            deleteButton.parentElement.submit()
        })

    })
})