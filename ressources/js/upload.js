$( document ).ready(function() {

  //---------------- Add file to list function --------------------------------
    var addFile = (p_fileName, p_type) => {

        if(p_type == 'd'){
            var classDefine = "flex flex-row w-full bg-red-200";
            var idDefine = 'd' + p_fileName;
            var position = $("#parentList");
            // var imgAddress = ;
        }else{
            var classDefine = "flex flex-row w-full";
            var idDefine = 'f' + p_fileName;
            var position = $("#parentNode").children().last();
            // var imgAddress = ;
        }

        <!-- File line Div creation -->
        let fileDiv = document.createElement("div");   <!-- Element creation -->
        fileDiv.setAttribute('id', idDefine);     <!-- ID define -->
        fileDiv.setAttribute('class', classDefine);     <!-- Class define -->

        <!-- Check case creation -->
        let checkDiv = document.createElement("div");   <!-- Element creation -->
        checkDiv.setAttribute('class', 'w-1/6 lg:w-1/12 border border-black text-center p-2'); <!-- Class define -->
        let checkText = document.createElement("input");   <!-- Element creation -->
        checkText.setAttribute('type', 'checkbox');     <!--  Define as checkbox -->
        // checkText.setAttribute('checked', 'uncheck');     <!--  Define as checkbox -->
        checkText.setAttribute('id', 'check' + p_fileName);     <!-- ID define -->
        checkText.setAttribute('class', 'text-center');     <!-- Class define -->

        <!-- Name file case creation and Text -->
        let nameDiv = document.createElement("div");   <!-- Element creation -->
        nameDiv.setAttribute('class', 'w-5/6 lg:w-6/12 border border-black text-center'); <!-- Class define -->
        nameDiv.setAttribute('id', p_fileName); <!-- Class define -->
        let nameText = document.createElement("p");   <!-- Element creation -->
        nameText.textContent = p_fileName;     <!-- insert text -->

        <!-- Author file case creation and Text -->
        let authorDiv = document.createElement("div");   <!-- Element creation -->
        authorDiv.setAttribute('class', 'w-0 lg:w-3/12 border border-black text-center invisible lg:visible'); <!-- Class define -->
        authorDiv.setAttribute('id', 'author' + p_fileName); <!-- Class define -->
        let authorText = document.createElement("p");   <!-- Element creation -->
        authorText.textContent = "Timothé LAINE";     <!-- insert text -->

        <!-- Size file case creation and Text -->
        let sizeDiv = document.createElement("div");   <!-- Element creation -->
        sizeDiv.setAttribute('class', 'w-0 lg:w-2/12 border border-black text-center invisible lg:visible'); <!-- Class define -->
        sizeDiv.setAttribute('id', 'size' + p_fileName); <!-- Class define -->
        let sizeText = document.createElement("p");   <!-- Element creation -->
        sizeText.textContent = "10 mo";     <!-- insert text -->


        position.after(fileDiv);

        fileDiv.appendChild(checkDiv);
        fileDiv.appendChild(nameDiv);
        fileDiv.appendChild(authorDiv);
        fileDiv.appendChild(sizeDiv);

        checkDiv.appendChild(checkText);
        nameDiv.appendChild(nameText);
        authorDiv.appendChild(authorText);
        sizeDiv.appendChild(sizeText);
    };

    // --------------- Check validation ---------------- //
    // $("#parentList").children().click(function(e) {
    //
    //     console.log(e.target.id);
    //     console.log($(this));
    // });

    $('#parentNode').bind('click', function(event) {

        let childNode= $(event.target);
        let parentNode = childNode.parent().parent();

        if(parentNode.attr('id') != 'parentNode' && parentNode.attr('id') != 'parentList') {

            if (document.getElementById(parentNode.find("input").attr('id')).checked){
                parentNode.prop('class', 'flex flex-row w-full');
                parentNode.find("input").prop("checked", false);
            }else {
                parentNode.prop('class', 'flex flex-row w-full bg-red-200');
                parentNode.find("input").prop("checked", true);
            }
        }




    });

  //---------------- Display files function --------------------------------
var displayFiles = () => {

    $.get("/api/fileDisplay", function (fileList) {   <!-- Get all file name -->

        let check = JSON.parse(fileList);
      if (check != 'e') {
       fileList = fileList.replace(/\[|]|"/g, '');  <!-- Remove special character -->
       let fileTab = fileList.split(',');   <!-- create file table -->

       fileTab.forEach(function (file) {
           addFile(file, 'f');

       });
   }
    });
};

//---------------- Folder creation function --------------------------------
    $("#btnFolder").click(function() {
        $("#insertName").show();
    });

    $(document).click(function(e) {

        if (e.target.id != 'btnFolder' && e.target.id != 'insertName' && e.target.id != 'btnValidation' && e.target.id != 'folderInput'){
            $("#insertName").hide();
        }

    });


    $("#folderInput").keyup(function() {

        if($("#folderInput").val() == null || $("#folderInput").val() == ''){

            $("#btnValidation").prop('disabled', true);
            $("#btnValidation").removeClass();
            $("#btnValidation").addClass("bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded w-1/4");
        }
        else{


            if(/^[a-zA-Z0-9]*$/.test($("#folderInput").val()) == false){
                $("#folderInput").removeClass();
                $("#folderInput").addClass("border border black");

                $("#btnValidation").prop('disabled', true);
                $("#btnValidation").removeClass();
                $("#btnValidation").addClass("bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded w-1/4");

            }else{
                $("#folderInput").removeClass();
                $("#folderInput").addClass("bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded lg:w-3/4");

                $("#btnValidation").prop('disabled', false);
                $("#btnValidation").removeClass();
                $("#btnalidation").addClass("bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded w-1/4");
            }
        }

    });


    $("#btnValidation").click(function () {

        let data = {"name" : $("#folderInput").val(), "path": ".\\storage\\" + $("#folderInput").val() };
        $.post('/api/folderCreation', data, function (message) {

            let messageTab = JSON.parse(message);
                addFile(messageTab.name, 'd');
        });
    });

 //---------------- Upload files function --------------------------------
    $("#btnUpload").click(function(e) {

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
                let messageTab = JSON.parse(message);
                $("#uploadMessage").text(messageTab.message);
                messageTab.forEach(function (file) {
                    addFile(file.name, 'f');
                })
            },
            error: function (message, status, error) {
                console.log("STATUT : " + status);
                console.log("MESSAGE : " + message);
                console.log("ERROR : " + error);
            }
        });
 //----------------- ------------------------------------------------------
    });
    $("#insertName").hide();

    displayFiles();     <!-- Display file -->


});