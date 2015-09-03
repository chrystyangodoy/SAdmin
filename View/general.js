function win(enderecoURL,w,h){
    $.fancybox({
        'padding':20,
        'autoScale':true,
        'overlaySlow':false,
        'transitionIn':'elastic',
        'transitionOut':'elastic',
        'width':w,
        'height':h,
        'href':enderecoURL,
        'type':'iFrame'
    });
}