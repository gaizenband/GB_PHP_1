const countClick = (id)=>{
    jQuery.ajax({
        type: "POST",
        url: 'server.php',
        dataType: 'json',
        data: {functionname: 'countClicks', arguments: id},
    });
}