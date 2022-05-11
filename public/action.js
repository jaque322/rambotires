$(document).ready(function () {
    $("#save").on('submit', function (e) {
        console.log("funcionando el evento onsubmit");
        e.preventDefault();
        const brand = $('#brand').val();
        const dimension = $('#dimension').val();
        const description = $('#description').val();
        const category = $('#category').val();
        const image = $('#imageFile').val();

        const csrfName = $("#csfr_token_id").attr("name");

        const csrfHash = $("#csfr_token_id").val();
        console.log(csrfName + "hash " + csrfHash);
        formData = [];
        if (brand == "" || dimension == "") {
            alert("Please fill Fields");

        } else {
            $.ajax({
                url: '/admin/create',
                method: 'post',
                data: {[csrfName]: csrfHash,brand:brand,dimension:dimension,description:description,category:category,image:image },
                dataType: 'json',
                success: function(response){

                    // Update CSRF hash
                    $('.txt_csrfname').val(response.token);

                    // Empty the elements
                    $('#suname,#sname,#semail').text('');

                    if(response.success == 1){
                        // Loop on response
                        $(response.user).each(function(key,value){

                            var uname = value.username;
                            var name = value.name;
                            var email = value.email;

                            $('#suname').text(uname);
                            $('#sname').text(name);
                            $('#semail').text(email);
                        });
                    }else{
                        // Error
                        alert(response.error);
                    }

                }
            });
        }

    })
})