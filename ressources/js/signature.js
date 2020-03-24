$( document ).ready(function() {

<!-------------------- Get the day date-------------------------------------------- -->
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    $("#todayDate").append(date);

 <!-------------------- Modal action-------------------------------------------- -->
    function toggleModal() {

        const body = document.querySelector('body');
        const modal = document.querySelector('.modal');
        modal.classList.toggle('opacity-0');
        modal.classList.toggle('pointer-events-none');
        body.classList.toggle('modal-active');
    }

     <!-- Open the modal on click -->
    var openmodal = document.querySelector('#btnOpen');
        openmodal.addEventListener('click', function (event) {
            event.preventDefault();
            toggleModal();
        });

     <!-- Close the modal function -->
    function closeModal(p_id) {
        var closemodal = document.querySelector('#' + p_id);
            closemodal.addEventListener('click', toggleModal)
    }

    <!-- Close the modal on Close click-->
    $("#btnClose").click(function () {  closeModal('btnClose'); });



<!-------------------- request to confirm the sign in the DB-------------------------------------------- -->
    $("#btnValidate").click(function () {  <!--  when the user click on sign button -->

         <!-- Verify that the checkbox is checked -->
        if (document.getElementById('checkSign').checked) {

            closeModal('btnValidate');  <!-- Clode the modal -->

            $.get("/api/sign", function (message) {

                if(message == 'true'){   <!-- SQL SUCCESS -->
                    $("#btnOpen").prop('disabled', true);
                    $("#pen").remove();
                    $("#btnText").html("Vous avez signé");
                    $("#btnOpen").prop("class", "font-bold rounded border-b-2 border-green-600 bg-green-500 text-white shadow-md py-2 px-6 inline-flex items-center")

                }else{ <!-- SQL ERROR -->

                }

            }).fail(function() { <!-- ERROR  -->

            });
        } else {

            $("#checkValidation").prop('class', 'bg-white border-2 rounded border-red-400 w-6 h-6 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500')
        }

    });

});
