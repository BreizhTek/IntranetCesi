$( document ).ready(function() {

  //---------------- Display files function --------------------------------
var displayFiles = () => {

    fileListParent.textContent = '';  <!-- Refresh the list -->

    $.get("/api/fileDisplay", function (fileList) {   <!-- Get all file name -->

        fileList = fileList.replace(/\[|]|"/g, '');  <!-- Remove special character -->
        let fileTab = fileList.split(',');

        fileTab.forEach(function (file, index) {
            let fileSpan = document.createElement("span"); // Create one div for each file
            fileSpan.setAttribute('id', 'file' + index); // define ID
            fileSpan.textContent = file; // insert file name into each div
            fileListParent.appendChild(fileSpan);
        });
    });
};

 //---------------- Upload files function --------------------------------
    $("#btnUpload").click(function(e) {

        $('#waitGif').show();   <!-- show the wiating gif during the file's upload -->

        e.preventDefault(); <!-- Stoping redirection submit action -->

        var form = $("#formUpload")[0]; <!-- Get the file -->

        var formData = new FormData(form); <!-- Create the DataForm Object -->

        <!-- AJAX Request to send file to deposit.php the file -->
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: '/api/Upload',
            cache: false,
            timeout: 800000,
            processData: false,
            contentType: false,
            data: formData,
            success: function (message,  status) {
                $("#uploadMessage").text(JSON.parse(message));
                $('#waitGif').hide();
                displayFiles();
            },
            error: function (message, status, error) {
                console.log("STATUT : " + status);
                console.log("MESSAGE : " + message);
                console.log("ERROR : " + error);
            }
        });
 //----------------- ------------------------------------------------------
    });

    $('#waitGif').hide();  <!-- Hide the waiting gif at the begining -->
    var fileListParent = document.createElement("div");
    fileListParent.setAttribute('id', 'fileList');
    $("#parentList").after(fileListParent);
    displayFiles();     <!-- Display file -->

});