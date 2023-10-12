//Add Popup animation//

let popup = document.getElementById("popup");

function openAdd(){
    popup.classList.add("open-popup");
    closeEdit();
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






// Function for sorting
function sortTable() {
    var table = document.getElementById("table");
    var rows = table.rows;
    var sortOption = document.getElementById("sort_option").value;

    // Convert rows to an array for sorting
    var rowsArray = Array.from(rows).slice(1); // Exclude the header row

    // Sort the array based on the selected option
    if (sortOption === "low-high") {
        rowsArray.sort(function (a, b) {
            var quantityA = parseInt(a.cells[4].textContent);
            var quantityB = parseInt(b.cells[4].textContent);
            return quantityA - quantityB;
        });
    } else if (sortOption === "high-low") {
        rowsArray.sort(function (a, b) {
            var quantityA = parseInt(a.cells[4].textContent);
            var quantityB = parseInt(b.cells[4].textContent);
            return quantityB - quantityA;
        });
    } else {
        // Revert to the original order (by row number)
        rowsArray.sort(function (a, b) {
            var rowNumberA = parseInt(a.cells[0].textContent);
            var rowNumberB = parseInt(b.cells[0].textContent);
            return rowNumberA - rowNumberB;
        });
    }

    // Reinsert sorted rows into the table
    for (var i = 0; i < rowsArray.length; i++) {
        table.appendChild(rowsArray[i]);
    }
}


// Alert for stock number and item description
function validateForm() {
    var ItemInput = document.getElementsByName('item_description[]')[0].value.toLowerCase();
    var StockInput = document.getElementsByName('stock_number[]')[0].value.toLowerCase();
    var ItemOptions = document.getElementsByName('item')[0].options;
    var StockOptions = document.getElementsByName('selected_item')[0].options;
    var itemExists = false;
    var stockExists = false;
    
    for (var i = 0; i < ItemOptions.length; i++) {
        if (ItemOptions[i].value.toLowerCase() === ItemInput) {
            itemExists = true;
            break;
        }   
    } 
        
    for (var i = 0; i < StockOptions.length; i++){  
        if (StockOptions[i].value.toLowerCase() === StockInput) {
            stockExists = true;
            break;
        }
    }
    
    if (itemExists || stockExists) {
        showErrorMessage("This Item Description or Stock Number already exists! Please input another.");
        return false; // Prevent form submission
    } else {
        // Form submission successful, show success message
        showSuccessMessage("Item added successfully!", 10);
        return true; // Allow form submission
        
    }
    function showErrorMessage(message) {
        swal.fire({
            title: "OOPPSS!!",
            text: message,
            icon: "error",
        });
    }
    function showSuccessMessage(message) {
        swal.fire({
            title: "SUCCESS!!",
            text: message,
            icon: "success",
        });
    }
    
}





// Search bar funtion
function searchTable() {
    var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[1]; // Stock No. column
        td2 = tr[i].getElementsByTagName("td")[3]; // Item Description column

        if (td1 && td2) {
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;

        if (txtValue1.toLowerCase().indexOf(filter) > -1 || txtValue2.toLowerCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}

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
  