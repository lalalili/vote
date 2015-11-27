$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse')
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })
})

function seed_confirm()
{
    var r=confirm("確認要建立測試資料 !!");
    if (r==true)
    {
        window.location.href='/admin/seed';
    }
}

function reset_photo_confirm()
{
    var r=confirm("確認要清空員工資料 !!");
    if (r==true)
    {
        window.location.href='/admin/reset/photos';
    }
}

function reset_vote_confirm()
{
    var r=confirm("確認要清空投票資料 !!");
    if (r==true)
    {
        window.location.href='/admin/reset/votes';
    }
}