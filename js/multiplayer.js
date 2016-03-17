jQuery(document).ready(function(){
    var movesleft = 6 * 7;
    var currmove = 1;
    
    userstatus = 2; // multiplayer
    
    notifyserverofstatus();
    
    InitLocalGame();
    
    whoismoving(currmove);

    jQuery('table.gameboard a').on('click', function(){
        fillcolor(currmove, $(this).data('column'));

        RecordMove(currmove, $(this).data('column'));
        
        movesleft --;
        
        checkwinner(currmove, movesleft);
        
        currmove = (currmove == 1) ? 2 : 1;

        whoismoving(currmove);
    });
});

function whoismoving(currmove)
{
    var msg = '';
    
    if(currmove == 1) {
        msg = 'Player one should move';
    } else {
        msg = 'Player two should move';
    }
    
    $('#whomoves').html(msg);
}

function fillcolor(player, column)
{
    for(i = 1; i < 7; i++) {
        if($('#row' + i + 'col' + column).hasClass('blank')) {
            $('#row' + i + 'col' + column).removeClass('blank');
            $('#row' + i + 'col' + column).addClass((player == 1) ? 'red' : 'black');
            break;
        }
    }
}

function checkwinner(player, remainingmoves)
{
    msg = '';
    haswinner = 0;

rowloop:
    for(row = 1; row < 7; row++) {
colloop:
        for(col = 1; col < 8; col++) {
            if(checkup(row, col) || checkside(row, col) || checkdiag(row, col)) {
                if(player == 1) {
                    msg = 'Player one wins.';
                    WinnerRed();
                } else {
                    msg = 'Player two wins.';
                    LosserRed();
                }
                haswinner = 1;
                break rowloop;
            }
        }
    }

    if(haswinner == 0 && remainingmoves == 0) {
        msg = 'This game is a tie.';
        TieGame();
    }

    if(msg != '') {
        alert(msg);
    }
}

function checkup(row, column)
{
    if($('#row' + row + 'col' + column).hasClass('blank')) {
        return false;
    }

    var cl1 = $('#row' + row + 'col' + column).attr('class');
    var cl2 = $('#row' + (row + 1) + 'col' + column).attr('class');
    var cl3 = $('#row' + (row + 2) + 'col' + column).attr('class');
    var cl4 = $('#row' + (row + 3) + 'col' + column).attr('class');

    if(cl1 == cl2 && cl2 == cl3 && cl3 == cl4) {
        return true;
    }

    return false;
}

function checkside(row, column)
{
    if($('#row' + row + 'col' + column).hasClass('blank')) {
        return false;
    }

    var cl1 = $('#row' + row + 'col' + column).attr('class');
    var cl2 = $('#row' + row + 'col' + (column + 1)).attr('class');
    var cl3 = $('#row' + row + 'col' + (column + 2)).attr('class');
    var cl4 = $('#row' + row + 'col' + (column + 3)).attr('class');

    if(cl1 == cl2 && cl2 == cl3 && cl3 == cl4) {
        return true;
    }

    return false;
}

function checkdiag(row, column)
{
    if($('#row' + row + 'col' + column).hasClass('blank')) {
        return false;
    }

    var cl1 = $('#row' + row + 'col' + column).attr('class');
    var cl2 = $('#row' + (row + 1) + 'col' + (column + 1)).attr('class');
    var cl3 = $('#row' + (row + 2) + 'col' + (column + 2)).attr('class');
    var cl4 = $('#row' + (row + 3) + 'col' + (column + 3)).attr('class');

    if(cl1 == cl2 && cl2 == cl3 && cl3 == cl4) {
        return true;
    }

    return false;
}
