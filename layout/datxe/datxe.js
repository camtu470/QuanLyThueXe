// Get all dropdowns from the document
const dropdowns = document.querySelectorAll('.dropdown');
//loop through all dropdown elements
dropdowns.forEach(dropdown => {
    //get inner elements from each dropdown
    const select = dropdown.querySelector('.select');
    const caret = dropdown.querySelector('.caret');
    const menu = dropdown.querySelector('.menu');
    const options = dropdown.querySelectorAll('.menu li');
    const selected= dropdown.querySelector('.selected');
// add a click event to the select element
    select.addEventListener('click', () =>{
        select.classList.toggle('select-clicked');
        caret.classList.toggle('caret-rotate');
        menu.classList.toggle('menu-open');
    });
    //loop through all option elements
    options.forEach(option =>{
        //add a click event to the option element
        option.addEventListener('click', () => {
            //change selected inner text to clicked option inner text
            selected.innerText = option.innerText;
            //add the clicked select styles to the select element
            select.classList.remove('select-clicked');
            //add the rorate styles to the caret element
            caret.classList.remove('caret-rotate');
            //add the open styles to the menu element
            menu.classList.remove('menu-open');
            //remive active class from all option element
            options.forEach(option => {
                option.classList.remove('active');
            });
            //add actice class to clicked option element
            option.classList.add('active');
        
        });
    });
});