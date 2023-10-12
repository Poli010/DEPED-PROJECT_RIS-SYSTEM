
// Function for Search Bar//
function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector(".scroll table");
    tr = table.querySelectorAll("tr"); // Get all table rows

    for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
        td = tr[i].querySelectorAll("td")[2]; // Column index 6 for Account Name
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    
}
// Function for Search Bar END//

//Add Popup animation//

let popup = document.getElementById("popup");

function openAdd(){
    popup.classList.add("open-popup");
    closeEdit();
    closeDelete();
}
function closeAdd(){
    popup.classList.remove("open-popup");
}
//Add Popup animation//

// Draggable Div Element for add inventory
const popup1 = document.querySelector(".popup");
const h2 = popup1.querySelector("h2");
let isDragging = false;
let initialX, initialY;

function onDragStart(e) {
    isDragging = true;
    initialX = e.clientX;
    initialY = e.clientY;
}

function onDrag(e) {
    if (!isDragging) return;

    const deltaX = e.clientX - initialX;
    const deltaY = e.clientY - initialY;
    initialX = e.clientX;
    initialY = e.clientY;

    let getStyle = window.getComputedStyle(popup1);
    let left = parseInt(getStyle.left);
    let top = parseInt(getStyle.top);

    const newLeft = left + deltaX;
    const newTop = top + deltaY;

    popup1.style.left = `${newLeft}px`;
    popup1.style.top = `${newTop}px`;
}

function onDragEnd() {
    isDragging = false;
}

h2.addEventListener("mousedown", onDragStart);
document.addEventListener("mousemove", onDrag);
document.addEventListener("mouseup", onDragEnd);
// Draggable Div Element END



//Edit Popup animation//
let popup2 = document.getElementById("popup2");

function openEdit(){
    popup2.classList.add("open-popup2");
    closeAdd();
    closeDelete();
}
function closeEdit(){
    popup2.classList.remove("open-popup2");
}
//Edit Popup animation//


// Draggable Div Element for edit inventory
const popupedit = document.querySelector(".popup2");
const edit = popupedit.querySelector("h2");
let isDragging1 = false;
let initialx, initialy;

function onDragStart1(e) {
    isDragging1 = true;
    initialx = e.clientX;
    initialy = e.clientY;
}

function onDrag1(e) {
    if (!isDragging1) return;

    const deltaX = e.clientX - initialx;
    const deltaY = e.clientY - initialy;
    initialx = e.clientX;
    initialy = e.clientY;

    let getStyle = window.getComputedStyle(popupedit);
    let left = parseInt(getStyle.left);
    let top = parseInt(getStyle.top);

    const newLeft = left + deltaX;
    const newTop = top + deltaY;

    popupedit.style.left = `${newLeft}px`;
    popupedit.style.top = `${newTop}px`;
}

function onDragEnd1() {
    isDragging1 = false;
}

edit.addEventListener("mousedown", onDragStart1);
document.addEventListener("mousemove", onDrag1);
document.addEventListener("mouseup", onDragEnd1);
// Draggable Div Element edit inventory END




//Delete Popup animation//
let popup3 = document.getElementById("popup3");

function openDelete(){
    popup3.classList.add("open-popup3");
    closeAdd();
    closeEdit();
}
function closeDelete(){
    popup3.classList.remove("open-popup3");
}
//Delete Popup animation//

// Draggable Div Element for edit inventory
const popupdelete = document.querySelector(".popup3");
const Delete = popupdelete.querySelector("h2");
let isDragging2 = false;
let initialx1, initialy1;

function onDragStart2(e) {
    isDragging2 = true;
    initialx1 = e.clientX;
    initialy1 = e.clientY;
}

function onDrag2(e) {
    if (!isDragging2) return;

    const deltaX = e.clientX - initialx1;
    const deltaY = e.clientY - initialy1;
    initialx1 = e.clientX;
    initialy1 = e.clientY;

    let getStyle1 = window.getComputedStyle(popupdelete);
    let left1 = parseInt(getStyle1.left);
    let top1 = parseInt(getStyle1.top);

    const newLeft = left1 + deltaX;
    const newTop = top1 + deltaY;

    popupdelete.style.left = `${newLeft}px`;
    popupdelete.style.top = `${newTop}px`;
}

function onDragEnd2() {
    isDragging2 = false;
}

Delete.addEventListener("mousedown", onDragStart2);
document.addEventListener("mousemove", onDrag2);
document.addEventListener("mouseup", onDragEnd2);
// Draggable Div Element edit inventory END




//Error message for Email that already Exist//
function validateForm() {
    var depedEmailInput = document.getElementsByName('deped_Email[]')[0].value.toLowerCase();
    var depedEmailOptions = document.getElementsByName('selected_email')[0].options;
    var depedEmailExists = false;
    
    
    for (var i = 0; i < depedEmailOptions.length; i++) {
        if (depedEmailOptions[i].value.toLowerCase() === depedEmailInput) {
            depedEmailExists = true;
            break;
        }   
    } 
        
    
    if (depedEmailExists) {
        showErrorMessage("Email Address is already exist.");
        return false; // Prevent form submission
    } 
    function showErrorMessage(message) {
        swal.fire({
            title: "OOPPSS!!",
            text: message,
            icon: "Error",
        });
        
    }
}
//Error message for Email that already Exist END//   


//Deped Email alert message(add_account)//
const depedEmailInput = document.getElementById("depedEmailInput");

    depedEmailInput.addEventListener("input", function () {
        const value = depedEmailInput.value;
        if (!value.match(/.+@deped\.gov\.ph$/)) {
            depedEmailInput.setCustomValidity("Please type the @deped.gov.ph");
        } else {
            depedEmailInput.setCustomValidity("");
        }
    });
//Deped Email alert message(add_account) END//

document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('accountTypeSelect');

    selectElement.addEventListener('click', function() {
        const placeholderOption = selectElement.querySelector('option[value=""]');
        placeholderOption.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('userOfficeSelect');

    selectElement.addEventListener('click', function() {
        const placeholderOption = selectElement.querySelector('option[value=""]');
        placeholderOption.style.display = 'none';
    });
});


// COLOR ALTERNATING FUNCTION
function applyAlternateRowColors() {
    $('tbody tr:visible:odd').css('background-color', 'lightgrey');
    $('tbody tr:visible:even').css('background-color', 'white');
  }
  // Initial application of alternate row colors
  applyAlternateRowColors();

  // Event listener for the search input
  $('#searchInput').on('input', function () {
    // Reapply alternate row colors after filtering
    applyAlternateRowColors();
  });
  



