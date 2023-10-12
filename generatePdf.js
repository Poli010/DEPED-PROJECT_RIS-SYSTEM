let form = document.querySelector("#formContainer");
        let btn = document.querySelector("#generatePDF");
        
        
        var opt = {
            margin:         [-13.75, -3 , 0, -80],
            filename:       'ris-form.pdf',
            image:          { type: 'jpeg', quality: .95},
            html2canvas:  { scale: 2, allowMagnification: false, width: 1500, height: 1550},
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