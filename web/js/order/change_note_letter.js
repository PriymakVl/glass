$(document).ready(function () {
    //change all orders
    $('#change-note-letter').click(function () {
        var tilte, note, letter, state;

        title = this.innerHTML;

        if (title == 'Примечание - Письмо') this.innerHTML = 'Примечание';
        else if (title == 'Примечание') this.innerHTML = 'Письмо';
        else if (title == 'Письмо') this.innerHTML = 'Примечание - Письмо';



        $('.note-letter').each(function() {
            if (title == 'Примечание - Письмо') {
                note = $(this).attr('note');
                $(this).text(note).css({'color': '#F00'});
            }
            else if (title == 'Примечание') {
                letter = $(this).attr('letter');
                $(this).text(letter).css({'color': '#000'});
            }
            else if (title == 'Письмо') {
                note = $(this).attr('note');
                letter = $(this).attr('letter');
                if (note) $(this).text(note).css({'color': '#F00'});
                else $(this).text(letter).css({'color': '#000'});
            }
        });
    });

    //change in one order
    $('.note-letter').click(function() {
        state = $(this).attr('state');
        note = $(this).attr('note');
        letter = $(this).attr('letter');

        if (state == 'note') $(this).text(letter).css({'color': '#000'}).attr('state', 'letter');
        else if (state == 'letter') $(this).text(note).css({'color': '#F00'}).attr('state', 'note');
    });

});