$( document ).ready(function() {

    //order is issued in work
    $('#order-state').click(function() {

        var order_id, state, ids = '';

        state = $(this).attr('state');

        $('table input:checked').each(function() {
            order_id = $(this).attr('order_id');
            if (order_id) ids += order_id + ',';
        });
        if (!ids) {
            alert('Вы не выбрали заказ');
            return;
        }
        location.href = 'http://' + location.host + '/order/state?ids=' + ids + '&state=' + state;
    });

    //order is preparation, is problem
    $('#order-preparation, #order-problem').click(function() {

        var kind, order_id, ids = '';

        kind = $(this).attr('kind');

        $('table input:checked').each(function() {
            order_id = $(this).attr('order_id');
            if (order_id) ids += order_id + ',';
        });
        if (!ids) {
            alert('Вы не выбрали заказ');
            return;
        }
        location.href = 'http://' + location.host + '/order/kind?ids=' + ids + '&kind=' + kind;
    });
});