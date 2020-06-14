$('.navbar-nav li').click(function(){
    $.get('menu.php', { menu: this.id }, function(data){
        $('#myPage').html(data); // inject HTML into above DIV,
    });
    });