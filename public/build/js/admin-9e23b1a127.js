function seed_confirm(){var i=confirm("確認要建立測試資料 !!");1==i&&(window.location.href="/admin/seed")}function reset_photo_confirm(){var i=confirm("確認要清空員工資料 !!");1==i&&(window.location.href="/admin/photo/reset")}function reset_vote_confirm(){var i=confirm("確認要清空投票資料 !!");1==i&&(window.location.href="/admin/vote/reset")}function reset_signup_confirm(){var i=confirm("確認要清空報名資料 !!");1==i&&(window.location.href="/admin/signup/reset")}$(function(){$("#side-menu").metisMenu()}),$(function(){$(window).bind("load resize",function(){topOffset=50,width=this.window.innerWidth>0?this.window.innerWidth:this.screen.width,width<768?($("div.navbar-collapse").addClass("collapse"),topOffset=100):$("div.navbar-collapse").removeClass("collapse"),height=this.window.innerHeight>0?this.window.innerHeight:this.screen.height,height-=topOffset,height<1&&(height=1),height>topOffset&&$("#page-wrapper").css("min-height",height+"px")})}),$(function(){var i={dateFormat:"yy-mm-dd",timeFormat:"HH:mm"};$("#event_at").datetimepicker(i)});
//# sourceMappingURL=admin.js.map