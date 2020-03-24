$(document).ready(function() {

    $("#rgpd").load("../view/rgpd.html #rgpdInsert");

    $(document).click(function (e) {

        if (e.target.id == "btnAccept") {
            $("#login").prop('disabled', false);
            $("#login").prop('class', 'cursor-pointer bg-orange-500 hover:bg-orange-400 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded')
            $("#rgpd").hide();
        }
        else if(e.target.id == "btnRefuse"){
            $("#login").prop('disabled', true);
            $("#rgpd").hide();

        }
        else if(e.target.id == "btnMoreInformation"){
            $("#login").prop('disabled', true);
            $("#rgpd").hide();
        }
    });

});