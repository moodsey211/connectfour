var userstatus = 0;
var gamingid = 0;

function notifyserverofstatus()
{
    var baseurl = $('body').data('baseurl');
    var currurl = '';
    
    switch(userstatus) {
        case 0:
            currurl = 'user/statusidle';
            break;
        case 1:
            currurl = 'user/statussingle';
            break;
        case 2:
            currurl = 'user/statusmultiplayer';
            break;
        case 3:
            currurl = 'user/statuschallenge';
            break;
    }
    
    jQuery.get({url: baseurl + '/' + currurl});
    
    setTimeout(notifyserverofstatus, 30000);
}

function InitLocalGame()
{
    var baseurl = $('body').data('baseurl');
    
    jQuery.get({url: baseurl + '/game/initlocalgame'}, function(data){
        gamingid = data;
    });
}

function RecordMove(player, cn, cnt)
{
    var baseurl = $('body').data('baseurl');
    
    jQuery.post({url: baseurl + '/game/recordmove', data: {gameid: gamingid, moveby: player, colnum: cn, movecnt: cnt}});
}

function WinnerRed()
{
    var baseurl = $('body').data('baseurl');
    
    jQuery.get({url: baseurl + '/game/winnerred'});
}

function LosserRed()
{
    var baseurl = $('body').data('baseurl');
    
    jQuery.get({url: baseurl + '/game/losserred'});
}

function TieGame()
{
    var baseurl = $('body').data('baseurl');
    
    jQuery.get({url: baseurl + '/game/tie'});
}
