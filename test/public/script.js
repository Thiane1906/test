let openModal=document.querySelectorAll('.open')
let modal = document.querySelector('.modal-infos')
let closeModal=document.querySelector('.close')
let ajoutContact=document.querySelector('.ajout')
let closeAjout=document.querySelector('.closeAjout')
let modalAjout=document.querySelector('.modal-ajout')
let nom=document.querySelector('.nom')
let prenom=document.querySelector('.prenom')
let categorie=document.querySelector('.categorie')
let submit=document.querySelector('#submit')

    openModal.forEach(element => {
        element.addEventListener('click',()=>{
            modal.style.display='flex'
        })
    });
   
    closeModal.addEventListener('click',()=>{
        modal.style.display='none'
    })
   
    ajoutContact.addEventListener('click',()=>{
        modalAjout.style.display='flex'
    })
    closeAjout.addEventListener('click',()=>{
        modalAjout.style.display='none'
    })

    function fetch(objet) {
        fetch('http://localhost:8000/contact/insertContact', {
            method: 'POST',
            body: JSON.stringify(objet),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => {
            // console.log(response.json());
            return response.json();
        })
        .then((data) => {
            console.log(data);
        })
        .catch((error) => {
            console.error('Erreur lors de la requête :', error);
        });
    }


    function insertContact() {
        submit.addEventListener("click", (e) => {
            e.preventDefault();
            let objet = {
                nom: nom.value,
                prenom: prenom.value,
                categorie: categorie.value,
            };
        
            console.log(objet);
        
            fetch(objet)
        });
     
    }

