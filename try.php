$insert_sql = "SELECT item_description FROM inventory WHERE stock_number = '$stock_number'";
    $insert_result = mysqli_query($con, $insert_sql);

    if ($insert_result) {
        $insert_row = mysqli_fetch_assoc($insert_result);
        $item_description = $insert_row["item_description"];

            $insertSql = "INSERT INTO usermanager_logs VALUES ('$accountName', '$stock_number','$item_description', '$addQuantity', '$formDate')";
            if (mysqli_query($con, $insertSql)) {
            }    
        } 
    } 

    $sql = "SELECT item_quantity FROM inventory WHERE stock_number = '$stock_number'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentQuantity = $row["item_quantity"];

        // Calculate the new quantity
        $newQuantity = $currentQuantity + $addQuantity;

        // Update the quantity in the database
        $updateSql = "UPDATE inventory SET item_quantity = $newQuantity WHERE stock_number = '$stock_number'";
        if (mysqli_query($con, $updateSql)) {    
        
        
        } 

        // queuing_release.js
document.addEventListener("DOMContentLoaded", function() {
    const btnCancel = document.getElementById("btnCancel");

    if (btnCancel) {
        btnCancel.addEventListener("click", function(event) {
            event.preventDefault();
            
            // Get the reference code you want to delete
            const referenceCode = document.querySelector("tr[data-reference-code]").getAttribute("data-reference-code");
            
            // Use SweetAlert for confirmation
            Swal.fire({
                title: "Are you sure?",
                text: "The request will delete permanently.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#162fa0",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, cancel it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with the deletion
                    $.ajax({
                        type: "POST",
                        url: "queuing-delete_row.php",
                        data: { referenceCode: referenceCode },
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                // Deletion successful, show success SweetAlert
                                Swal.fire("Deleted!", "Request has been canceled.", "success").then(() => {
                                    // Navigate to another page
                                    window.location.href = 'queuing system.php';
                                });
                            } else {
                                // Deletion failed, show an error SweetAlert
                                Swal.fire("Error", "Error deleting request: " + response.error, "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle AJAX error and show an error SweetAlert
                            Swal.fire("Error", "AJAX Error: " + error, "error");
                        }
                    });
                }
            });
        });
    }
});

        

let form = document.querySelector("#formContainer");
        let btn = document.querySelector("#generatePDF");
        
        
        var opt = {
            margin:         [-30, -40, 0, -100],
            filename:       'ris-form.pdf',
            image:          { type: 'jpeg', quality: .95},
            html2canvas:  { scale: 2, allowMagnification: false, width: 1850, height: 1720},
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' },
        };

        btn.addEventListener('click', () => {
            
            let clonedForm = $(form).clone();
            clonedForm.find('#btnRelease').hide();

            $(form).find('select').each(function(index, originalSelect) {
                let clonedSelect = $(clonedForm).find('select').eq(index);
                
                let selectedValue = $(originalSelect).val();
                
                $(clonedSelect).val(selectedValue);
            });

            $(form).append(clonedForm);

            html2pdf().set(opt).from(form).save().then(() => {
                
                document.getElementById("btnRelease").click();
            });

            document.getElementById("btnRelease").style.display = "none";
        });

        /* RESPONSIVE */
@media screen and (min-width:1880px){
    .container{
        margin-top: -5.5%;
    }
    
    .searchbar{
        float: right;
        margin: 140px 21% 0px 0px;   
    }

    .deletebtn{
        float: right;
        text-decoration: none;
        margin: 130px -20.8% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    .convertbtn{
        float: right;
        text-decoration: none;
        margin: 130px -31% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    h2{
        font-size: 35px;
        margin-left: 45%;
    }
    table{
        margin-left: 11%;
        font-size: 20px;
        width: 89%;
    }
    table tr{
        height: 50px;
    }

    table tr td{
        line-height: 20px;
    }

    .scroll{
        margin-left: -3%;
        margin-top: 10px;
        width: 95%;
        height: 350px;
    }

    .sorting{
        margin-left: 83%;
    }
    
}

@media screen and (max-width:1366px){
    .container{
        margin-top: -9%;
        width: 300px;
        transform: translateX(-300px);
    }

    .searchbar{
        float: right;
        margin: 140px 22% 0px 0px;    
    }

    .deletebtn{
        float: right;
        text-decoration: none;
        margin: 130px -25.5% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    .convertbtn{
        float: right;
        text-decoration: none;
        margin: 130px -35.7% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    h2{
        font-size: 35px;
        margin-left: 40%;
    }
    table{
        margin-left: 11%;
        font-size: 20px;
        width: 89%;
    }
    table tr{
        height: 50px;
    }

    table tr td{
        line-height: 20px;
    }

    .scroll{
        margin-left: -2%;
        margin-top: 10px;
        width: 95%;
        height: 350px;
    }

    .sorting{
        margin-left: 80%;
    }
}

@media screen and (max-width:1200px){
    .container{
        margin-top: -11%;
        width: 300px;
        transform: translateX(-300px);
    }
    
    .searchbar{
        float: right;
        margin: 140px 22% 0px 0px;    
    }

    .deletebtn{
        float: right;
        text-decoration: none;
        margin: 130px -27.5% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    .convertbtn{
        float: right;
        text-decoration: none;
        margin: 130px -37.7% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    h2{
        font-size: 35px;
        margin-left: 40%;
    }
    table{
        margin-left: 11%;
        font-size: 20px;
        width: 89%;
    }
    table tr{
        height: 50px;
    }

    table tr td{
        line-height: 20px;
    }

    .scroll{
        margin-left: -2%;
        margin-top: 10px;
        width: 95%;
        height: 350px;
    }

    .sorting{
        margin-left: 80%;
    }
    
}

@media screen and (max-width:1024px){
    .container{
        margin-top: -13%;
        width: 300px;
        transform: translateX(-300px);
    }
    
    .searchbar{
        float: right;
        margin: 140px 22% 0px 0px;    
    }

    .deletebtn{
        float: right;
        text-decoration: none;
        margin: 130px -30.5% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    .convertbtn{
        float: right;
        text-decoration: none;
        margin: 130px -40.7% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    h2{
        font-size: 35px;
        margin-left: 40%;
    }
    table{
        margin-left: 11%;
        font-size: 20px;
        width: 89%;
    }
    table tr{
        height: 50px;
    }

    table tr td{
        line-height: 20px;
    }

    .scroll{
        margin-left: -2%;
        margin-top: 10px;
        width: 95%;
        height: 350px;
    }

    .sorting{
        margin-left: 77%;
    }
    
}

@media screen and (max-width:768px){
    .container{
        margin-top: -18%;
        width: 300px;
        transform: translateX(-300px);
    }
    
    .searchbar{
        float: right;
        margin: 140px 25% 0px 0px;    
    }

    .deletebtn{
        float: right;
        text-decoration: none;
        margin: 130px -37.5% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    .convertbtn{
        float: right;
        text-decoration: none;
        margin: 130px -47.7% 0px 0px;
        height: 25%;
        width: 10%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 15px;
    }

    h2{
        font-size: 35px;
        margin-left: 30%;
    }
    table{
        margin-left: 11%;
        font-size: 20px;
        width: 89%;
    }
    table tr{
        height: 50px;
    }

    table tr td{
        line-height: 20px;
    }

    .scroll{
        margin-left: -2%;
        margin-top: 10px;
        width: 95%;
        height: 350px;
    }

    .sorting{
        margin-left: 70%;
    }
    
}


@media screen and (min-width: 768px) {
    .container{
        height: 81.7%;
        width: 210px;
        position: absolute;
        margin-top: -0%;
        background: #162fa0;
        z-index: 1;
        transition: transform 0.5s;
        transform: translateX(-210px);
    }

    .container .head{
        color: white;
        font-size: 20px;
        font-weight: bold;
        padding: 30px;
        text-transform: uppercase;
        text-align: center;
        letter-spacing: 3px;
        background: #7c9885;
    }

    ol li a{
        color: white;
        padding: 20px 20px 0px 0px;
        text-decoration: none;
        display: block;
        font-size: 15px;
        letter-spacing: 1px;
        position: relative;
        transition: 0.3s;
        overflow: hidden;
        text-transform: capitalize;
    }

    ol li a i{
        margin-left: -10px;
        width: 70px;
        font-size: 20px;
        text-align: center;
    }

    .searchbar{
        float: right;
        margin: 140px 19% 0px 0px;  
    }

    .searchbar input{
        width: 100%;
    }

    .convertbtn{
        float: right;
        text-decoration: none;
        margin: 17.5% -39% 0px 0px;
        height: 22%;
        width: 15%;
        border-radius: 15px;
        cursor: pointer;
        background: transparent;
        color: white;
        border: 1px solid black;
        outline: none;
        font-size: 13px;
    }

    h2{
        font-size: 30px;
        text-align: center;
    }

    .select{
        display: flex;
        margin-top: 20px;
        margin-left: 10px;
        font-size: 10px;
    }
    
    .select label{
        display: flex;
        margin: 0px 0px 0px 5px;
    }
    
    .select select{
        border: 2px solid black;
        margin-left: 10px;
        margin-top: -5px;
        cursor: pointer;
        font-size: 10px;
        width: 15%;
        height: 5%;
      
    }
    
    .select_item{
        display: flex;
        margin-left: ;
        margin-top: 2px;
    }
    
    .select_name{
        display: flex;
        margin-left: 5px;
        margin-top: 2px;
    }
    .total-quantity{
        position: absolute;
        margin: 450px 0px 0px 70%;
    }
    .total-quantity input{
        border: 2px solid black;
        font-size: 15px;
    }
    .sorting{
        position: absolute;
        margin-left: 60px;
    }

    table{
        font-size: 15px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        margin-left: 10px;
        font-size: 13px;
        border: 2px solid black;
        line-height: 20px;
    }

    .scroll{
        margin-top: 20px;
        width: 100%;
        height: 400px;
        overflow-y: scroll;
    }

}

@media screen and (min-width: 843px) {
 
}

@media screen and (min-width: 928px) {

    
}

@media screen and (min-width: 1013px) {
 
}

@media screen and (min-width: 1108px) {
 
    
}

@media screen and (min-width: 1024px) {
 
    
}

@media screen and (min-width: 1220px) {
  
}

@media screen and (min-width: 1332px) {

    
}

@media screen and (min-width: 1366px) {
 
    
}

@media screen and (min-width: 1411px) {
 
    
}

@media screen and (min-width: 1440px) {
 
    
    
}

@media screen and (min-width: 1610px) {
 
}

@media screen and (min-width: 1712px) {

    
}

@media screen and (min-width: 1880px) {

    
}


.select{
        display: flex;
        margin-top: 20px;
        margin-left: 1%;
        font-size: 12px;
    }
    
    .select label{
        margin: 0px 0px 0px 5px;
    }
    
    .select select{
        border: 2px solid black;
        cursor: pointer;
        font-size: 7px;
    }
    
    .select_item{
        margin-left: 0px;
        margin-top: 2px;
    }
    
    .select_name{
        margin-left: 0px;
        margin-top: 2px;
    }
    .total-quantity{
        position: absolute;
        margin: 400px 0px 0px 72%;
    }
    .total-quantity input{
        border: 2px solid black;
        font-size: 15px;
    }
    .sorting{
        position: absolute;
        margin-top: -13px;
        margin-left: 2px;
    }





    queuing system:

    /* RESPONSIVE */
@media screen and (min-width: 768px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 10px;
        padding: 12px 12px 12px 12px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 13px;
    }

    .title h2{
        text-align: center;
        font-size: 30px;
        margin-left: 10%;
    }

    table{
        font-size: 17px;
        margin-left: 0%;
        margin-top: 20px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 15px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 90%;
        margin-left: 6%;
        overflow-y: scroll;
    }

    
}

@media screen and (min-width: 848px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 10px;
        padding: 12px 12px 12px 12px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 13px;
    }

    .title h2{
        text-align: center;
        font-size: 30px;
        margin-left: 10%;
    }

    table{
        font-size: 17px;
        margin-left: 0%;
        margin-top: 20px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 15px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 90%;
        margin-left: 6%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 936px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 10px;
        padding: 12px 12px 12px 12px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 13px;
    }

    .title h2{
        text-align: center;
        font-size: 30px;
        margin-left: 10%;
    }

    table{
        font-size: 17px;
        margin-left: 0%;
        margin-top: 20px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 15px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 90%;
        margin-left: 6%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 1050px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 10px;
        padding: 12px 12px 12px 12px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 13px;
    }

    .title h2{
        text-align: center;
        font-size: 30px;
        margin-left: 5%;
    }

    table{
        font-size: 17px;
        margin-left: 0%;
        margin-top: 20px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 15px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 90%;
        margin-left: 6%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 1168px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 10px;
        padding: 12px 12px 12px 12px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 15px;
    }

    .title h2{
        text-align: center;
        font-size: 30px;
        margin-left: 5%;
    }

    table{
        font-size: 18px;
        margin-left: 0%;
        margin-top: 20px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 16px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 83%;
        margin-left: 11%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 1257px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 100px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 10px;
        padding: 12px 12px 12px 12px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 15px;
    }

    .title h2{
        text-align: center;
        font-size: 30px;
        margin-left: 5%;
    }

    table{
        font-size: 19px;
        margin-left: 0%;
        margin-top: 20px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 17px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 83%;
        margin-left: 11%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 1350px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 93px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 93px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 93px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 20px;
        padding: 13px 13px 13px 13px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 16px;
    }

    .title h2{
        text-align: center;
        font-size: 32px;
        margin-left: 5%;
    }

    table{
        font-size: 19px;
        margin-left: 0%;
        margin-top: 15px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 17px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 83%;
        margin-left: 11%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 1411px) {
    header img{
        margin-top: 10px;
        width: 100px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 93px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 93px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -90px;
        margin-left: 93px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -70px;
        margin-right: 20px;
        padding: 13px 13px 13px 13px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 16px;
    }

    .title h2{
        text-align: center;
        font-size: 32px;
        margin-left: 5%;
    }

    table{
        font-size: 19px;
        margin-left: 0%;
        margin-top: 15px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 17px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 82%;
        margin-left: 11%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 1615px) {
    header img{
        margin-top: 10px;
        width: 120px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -100px;
        margin-left: 110px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -100px;
        margin-left: 110px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -100px;
        margin-left: 110px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -90px;
        margin-right: 20px;
        padding: 14px 14px 14px 14px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 16px;
    }

    .title h2{
        text-align: center;
        font-size: 35px;
        margin-left: 5%;
    }

    table{
        font-size: 20px;
        margin-left: 0%;
        margin-top: 15px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 18px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 82%;
        margin-left: 11%;
        overflow-y: scroll;
    }
    
}

@media screen and (min-width: 1771px) {
    header img{
        margin-top: 10px;
        width: 130px;
    }

    .headerTitles{
        margin-top: -.3%;
        margin-left: 1%;
    }
    
    .headerTitles h1{
        font-size: 130%;
        color: white;
        position: absolute;
        margin-top: -100px;
        margin-left: 120px;
        
    }
    
    .headerTitles h2{
        font-size: 120%;
        color: white;
        position: absolute;
        margin-top: -100px;
        margin-left: 120px;
        font-weight: 100;
        
    }
    
    .headerTitles h3{
        font-size: 95%;
        color: white;
        position: absolute;
        margin-top: -100px;
        margin-left: 120px;
        font-weight: 100;
        
    }

    .backbtn{
        float: right;
        margin-top: -105px;
        margin-right: 20px;
        padding: 14px 14px 14px 14px;
        color: white;
        text-decoration: none;
        border: 2px solid black;
        border-radius: 10px;
        font-size: 18px;
    }

    .title h2{
        text-align: center;
        font-size: 35px;
        margin-left: 5%;
    }

    table{
        font-size: 22px;
        margin-left: 0%;
        margin-top: 15px;
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse; 
    }

    table tr td{
        height: 50px;
        font-size: 20px;
        border: 2px solid black;  
        line-height: 20px;
    }

    .scroll{
        width: 80%;
        margin-left: 12%;
        overflow-y: scroll;
    }
    
}