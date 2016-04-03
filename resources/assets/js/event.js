var url = $('.btn-url').data('url');
$('#btn-devolunteer').on('click', function(e) {
    $.ajax({
        'url': url,
        'method': 'DELETE',
        'data': {
            '_token': $('meta[name=_token]').attr('content'),
        }
    }).done(function(response) {
        window.location.reload(true); 
    }).fail(function(e) {
        console.error(e);
    });
});

$('#btn-volunteer').click(function(e) {
    e.preventDefault();

    $.ajax({
        'url': url,
        'method': 'POST',
        'data': {
            'event_id': $('#btn-volunteer').data('event'),
            'user_id': $('#btn-volunteer').data('user'),
            '_token': $('meta[name=_token]').attr('content'),
        },
    }).done(function(data) {
        window.location.reload(true); 
    }).fail(function(e) {
        console.error(e);
    });
});
