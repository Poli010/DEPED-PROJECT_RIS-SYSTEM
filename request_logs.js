// Function for SearchBar
function searchTable() {
    var input, filter, table, tr, td1, td2, td3, td4, td5, td6, td7, td8, i, txtValue1, txtValue2, txtValue3 ,txtValue4 ,txtValue5, txtValue6, txtValue7, txtValue8;
    input = document.getElementById("searchInput");
    filter = input.value.toLowerCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[0]; // RIS No. column
        td2 = tr[i].getElementsByTagName("td")[1]; // Account Name column
        td3 = tr[i].getElementsByTagName("td")[2]; // User Office column
        td4 = tr[i].getElementsByTagName("td")[3]; // Stock No. column
        td5 = tr[i].getElementsByTagName("td")[4]; // Item Description column
        td7 = tr[i].getElementsByTagName("td")[5]; // Date column
        td8 = tr[i].getElementsByTagName("td")[6]; // Date column
        td6 = tr[i].getElementsByTagName("td")[7]; // Date column
        
        

    if (td1 && td2 && td3 && td4 && td5 && td6 && td7 && td8) {
        txtValue1 = td1.textContent || td1.innerText;
                txtValue2 = td2.textContent || td2.innerText;
                txtValue3 = td3.textContent || td3.innerText;
                txtValue4 = td4.textContent || td4.innerText;
                txtValue5 = td5.textContent || td5.innerText;
                txtValue6 = td6.textContent || td6.innerText;
                txtValue7 = td7.textContent || td7.innerText;
                txtValue8 = td8.textContent || td8.innerText;

        if (txtValue1.toLowerCase().indexOf(filter) > -1 || txtValue2.toLowerCase().indexOf(filter) > -1 || txtValue3.toLowerCase().indexOf(filter) > -1 || txtValue4.toLowerCase().indexOf(filter) > -1 || txtValue5.toLowerCase().indexOf(filter) > -1 || txtValue6.toLowerCase().indexOf(filter) > -1 || txtValue7.toLowerCase().indexOf(filter) > -1 || txtValue8.toLowerCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
            
    }
}


// Function for Search Bar END//

// Function for exporting to excel

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'request_logs.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}


//Function for filter
function filterTable() {
    var filterFrom = document.getElementById("filterFrom").value;
    var filterTo = document.getElementById("filterTo").value;
    var table = document.getElementById("table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        var formDateCell = rows[i].querySelector(".align-release-date");
        if (!formDateCell) continue; // Skip rows without the cell

        var formDate = formDateCell.textContent;

        if (
            (filterFrom === "" || formDate >= filterFrom) &&
            (filterTo === "" || formDate <= filterTo)
        ) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}
function filterTable2() {
    var descriptionSelect = document.getElementById("filterBy");
    var descriptionFilterValue = descriptionSelect.value.toLowerCase();

    var nameSelect = document.getElementById("filterName");
    var nameFilterValue = nameSelect.value.toLowerCase();

    var filterFrom = document.getElementById("filterFrom").value;
    var filterTo = document.getElementById("filterTo").value;

    var table = document.getElementById("table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        var descriptionCell = rows[i].querySelector(".align-item-description");
        var nameCell = rows[i].querySelector(".align-account-name");
        var formDateCell = rows[i].querySelector(".align-release-date");

        if (!descriptionCell || !nameCell || !formDateCell) continue; // Skip rows without any of the cells

        var description = descriptionCell.textContent.toLowerCase();
        var name = nameCell.textContent.toLowerCase();
        var formDate = formDateCell.textContent;

        var row = rows[i];

        // Check if all filters match, and show/hide accordingly
        if ((descriptionFilterValue === "" || description.indexOf(descriptionFilterValue) > -1) &&
            (nameFilterValue === "" || name.indexOf(nameFilterValue) > -1) &&
            ((filterFrom === "" || formDate >= filterFrom) &&
            (filterTo === "" || formDate <= filterTo))) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}

// Function to calculate and display the total quantity
function updateTotal() {
    const filterFrom = document.getElementById("filterFrom").value;
    const filterTo = document.getElementById("filterTo").value;
    const filterItem = document.getElementById("filterBy").value;
    const filterName = document.getElementById("filterName").value;

    let total = 0;

    // Loop through the table rows and calculate the total based on the selected filters
    const table = document.getElementById("table");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        const row = rows[i];
        const rowData = row.getElementsByTagName("td");

        const formDate = rowData[9].textContent;
        const itemDescription = rowData[5].textContent;
        const accountName = rowData[1].textContent;

        if ((filterFrom === "" || formDate >= filterFrom) &&
            (filterTo === "" || formDate <= filterTo) &&
            (filterItem === "" || itemDescription === filterItem) &&
            (filterName === "" || accountName === filterName)) {
            // If the row matches the selected filters, add its quantity to the total
            const quantity = parseInt(rowData[7].textContent);
            if (!isNaN(quantity)) {
                total += quantity;
            }
        }
    }

    // Update the total input field
    document.getElementById("totalQuantity").value = total;
}

// Attach the updateTotal function to filter change events
document.getElementById("filterFrom").addEventListener("change", updateTotal);
document.getElementById("filterTo").addEventListener("change", updateTotal);
document.getElementById("filterBy").addEventListener("change", updateTotal);
document.getElementById("filterName").addEventListener("change", updateTotal);

// Initial update
updateTotal();

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
            var quantityA = parseInt(a.cells[7].textContent);
            var quantityB = parseInt(b.cells[7].textContent);
            return quantityA - quantityB;
        });
    } else if (sortOption === "high-low") {
        rowsArray.sort(function (a, b) {
            var quantityA = parseInt(a.cells[7].textContent);
            var quantityB = parseInt(b.cells[7].textContent);
            return quantityB - quantityA;
        });
    } else {
        window.location.reload();

    }

    // Reinsert sorted rows into the table
    for (var i = 0; i < rowsArray.length; i++) {
        table.appendChild(rowsArray[i]);
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
  
