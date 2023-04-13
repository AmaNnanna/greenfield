 <!--**********************************
            Footer start
        ***********************************-->

 <!--**********************************
  Footer start
***********************************-->
 <div class="footer">
     <div class="copyright">
         <p>© Copyrights <script>
                 document.write(new Date().getFullYear());
             </script> Greenfield Executive Education</p>
         <p>Designed &amp; Developed by <a href="https://vecstavet.com/" target="_blank">VěcStavět Technologies</a>
         </p>
     </div>
 </div>
 <!--**********************************
  Footer end
***********************************-->
 <!--**********************************
            Footer end
        ***********************************-->

 <!--**********************************
           Support ticket button start
        ***********************************-->

 <!--**********************************
           Support ticket button end
        ***********************************-->


 </div>
 <!--**********************************
        Main wrapper end
    ***********************************-->

 <!--**********************************
        Scripts
    ***********************************-->
 <script src="<?= $assets ?>/js/jquery.js"></script>

 <script>
     const mySelect = document.querySelector('#event');
     mySelect.addEventListener('change', function() {
         const selectedOption = mySelect.value;
         const myTable = document.querySelector("#example2");
         const TableBody = document.querySelector("#example2 tbody");
         $.ajax({
             url: "./ajax/getpost",
             type: "POST",
             data: {
                 id: selectedOption
             },
             async: true,
             success: async function(result) {
                 TableBody.innerHTML = ''; // clear table content first.
                 result = JSON.parse(result) // convert string to JSON object.
                 result.forEach((element) => {
                     let row = document.createElement("tr");
                     let snCell = document.createElement("td");
                     snCell.textContent = element[0];
                     row.appendChild(snCell);

                     let surnameCell = document.createElement("td");
                     surnameCell.textContent = element[2];
                     row.appendChild(surnameCell);

                     let otherNamesCell = document.createElement("td");
                     otherNamesCell.textContent = element[3];
                     row.appendChild(otherNamesCell);

                     let emailCell = document.createElement("td");
                     emailCell.textContent = element[4];
                     row.appendChild(emailCell);

                     let mobileCell = document.createElement("td");
                     mobileCell.textContent = element[5];
                     row.appendChild(mobileCell);

                     let businessCell = document.createElement("td");
                     businessCell.textContent = element[8];
                     row.appendChild(businessCell);

                     let jobTitleCell = document.createElement("td");
                     jobTitleCell.textContent = element[6];
                     row.appendChild(jobTitleCell);

                     let companyCell = document.createElement("td");
                     companyCell.textContent = element[7];
                     row.appendChild(companyCell);

                     let countryCell = document.createElement("td");
                     countryCell.textContent = element[10];
                     row.appendChild(countryCell);

                     // Add the row to the table body
                     TableBody.appendChild(row);
                 });
             },
         });
     });
 </script>
 <script src="<?= $adminassets ?>/ckeditor/ckeditor.js" type="text/javascript"></script>
 <script>
     CKEDITOR.replace('firstContentArea');
     CKEDITOR.replace('secondContentArea');
     CKEDITOR.replace('thirdContentArea');
 </script>

 <script src="<?= $adminassets ?>/vendor/global/global.min.js" type="text/javascript"></script>


 <script src="<?= $adminassets ?>/vendor/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>


 <script src="<?= $adminassets ?>/vendor/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>

 <script src="<?= $adminassets ?>/js/custom.js" type="text/javascript"></script>

 <script src="<?= $adminassets ?>/js/deznav-init.js" type="text/javascript"></script>



 <script src="<?= $adminassets ?>/vendor/global/global.min-10.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/bootstrap-select/js/bootstrap-select.min-10.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/moment/moment.min.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/clockpicker/js/bootstrap-clockpicker.min.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/jquery-asColor/jquery-asColor.min.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/jquery-asGradient/jquery-asGradient.min.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/pickadate/picker.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/pickadate/picker.time.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/vendor/pickadate/picker.date.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/plugins-init/bs-daterange-picker-init.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/plugins-init/clock-picker-init.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/plugins-init/jquery-asColorPicker.init.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/plugins-init/material-date-picker-init.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/plugins-init/pickadate-init.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/custom.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/custom-10.js" type="text/javascript"></script>
 <script src="<?= $adminassets ?>/js/deznav-init-10.js" type="text/javascript"></script>

 </body>

 </html>