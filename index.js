$('.openBtn1').on('click',function(){
    $('.modal-title').text("Dr Lucas Werey");
    $('.modal-body').load('generaliste.php?id=1',function(){
        $('#myModal1').modal({show:true});
    });
});

$('.openBtn2').on('click',function(){
    $('.modal-title').text("Dr Octave Prévot");
    $('.modal-body').load('generaliste.php?id=2',function(){
        $('#myModal2').modal({show:true});
    });
});
$('.openBtn3').on('click',function(){
    $('.modal-title').text("Dr Léna Heurtaux");
    $('.modal-body').load('generaliste.php?id=3',function(){
        $('#myModal3').modal({show:true});
    });
});
$('.openBtn4').on('click',function(){
    $('.modal-title').text("Dr Matthieu Vu-Huy-Dat");
    $('.modal-body').load('generaliste.php?id=4',function(){
        $('#myModal4').modal({show:true});
    });
});
$('.openBtn5').on('click',function(){
    $('.modal-title').text("Dr Baptiste Bernaud");
    $('.modal-body').load('generaliste.php?id=5',function(){
        $('#myModal5').modal({show:true});
    });
});
$('.openBtn6').on('click',function(){
    $('.modal-title').text("Dr Clémence Amaladasse");
    $('.modal-body').load('generaliste.php?id=6',function(){
        $('#myModal6').modal({show:true});
    });
});

/*
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text("Dr. " + recipient)
    modal.find('.modal-body input').val(recipient)
  })
  */