$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });

    $('.hide').hide();

    $('#Check1').on('click',function () {
        $('#chambre').show();
    })

    $('#Check2').on('click',function () {
        $('#salon').show();
    })

    $('.cuisine').on('click',function () {
        $('#inpputcuisine').show()
    })


    $('#Check3').on('click',function () {
        $('#bain').show();
    })

    $('.cache').hide();
    $('.piece').hide();


    $('#type').on('click',function () {
        var text = $( "#type option:selected" ).text();
        if (text === 'himeuble'){
            $('.cache').show();

        }else if(text !== 'himeuble'){
            $('.cache').hide();

        }

        if (text !== 'himeuble'){
            $('.piece').show();

        }else{
            $('.piece').hide();

        }
    })

    $('#type').on('click', function () {
            $('#type2').hide()

    })

    $('#proprio').hide();
    $('#tenant').hide();
    $('#condition').hide();

    $('.proprio').on('click',function () {
        $('#proprio').show(1000);
        if($('#proprio').show()){

            $('.proprio').on('click',function () {
                $('#proprio').hide(1000);
            })
        }
    })

    $('.tenant').on('click',function () {
        $('#tenant').show(1000);
        if($('#tenant').show()){

            $('.tenant').on('click',function () {
                $('#tenant').hide(1000);
            })
        }
    })

    $('.condition').on('click',function () {
        $('#condition').show(1000);
        if($('#condition').show()){

            $('.condition').on('click',function () {
                $('#condition').hide(1000);
            })
        }
    })

    $('#porActivite').hide();

    $(".act").on('click', function () {
        $("#porActivite").show()
    })


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_file').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#input_file").change(function() {
        readURL(this);
    });



    $(document).ready(function() {

        if(window.File && window.FileList && window.FileReader) {
            $("#files").on("change",function(e) {
                var files = e.target.files ,
                    filesLength = files.length ;
                for (var i = 0; i < filesLength ; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<img>",{
                            class : "imageThumb ml-4",
                            width : 200,
                            src : e.target.result,
                            title : file.name
                        }).insertAfter("#image_preview");
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else { alert("Your browser doesn't support to File API") }
    });






});
