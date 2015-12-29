var bodyWidth = $("body").css("width");
$("div.items").css("width", (bodyWidth.substring(0, bodyWidth.length - 2) - 380) + "px");

//參與抽獎人數初始值
var itemCount = 120;
//跑馬燈迴圈
var tx;
var runtx;
//是否正在運行跑馬燈
var isRun = true;
//是否跑馬燈暫停狀態
var pause = false;
//排名分組顯示演算法已經取消
//var ts=20
//預設跑馬燈頻率
var pl = 50;
//程式是否開始運行用於判斷程式是否開始運行
var isStart = false;

var zzs = "#98ff98";
//跑馬燈音效
//var runingmic=document.getElementById("runingmic");
//runingmic.volume=0.5;
//中獎音效
//var pausemic=document.getElementById("pausemic");
//pausemic.volume=1.0;

var keyStatus = false;

$("document").ready(function () {

    //初始化皮膚
    if (localStorage.getItem("pf")) {
        var pf = localStorage.getItem("pf");
        dynamicLoading.css("/css/style" + pf + ".css");
        $("input[name=pf][value=" + pf + "]").attr("checked", true);
        if (pf != 1) {
            zzs = "#ba3030";
        }
    }
    //初始化標題
    if (localStorage.getItem("title")) {
        $("#title").val(localStorage.getItem("title"));
    }
    $(".top").text($("#title").val());

    //頻率模式本機存放區
    if (localStorage.getItem("ms")) {
        pl = localStorage.getItem("ms");
        $("input[name=ms][value=" + pl + "]").attr("checked", true);
    }
    //排名信息本機存放區
    if (localStorage.getItem("sequence")) {
        var ssHtml = localStorage.getItem("sequence");
        $(".ss").html(ssHtml);
    }

    //已經取消的輸入
    //var inputItemCount = prompt("請輸入參與抽獎人數(請輸入數位，輸入非數位會按預設人數計算)。");

    //本地排名資訊存儲
    if (localStorage.getItem("itemCount")) {
        itemCount = localStorage.getItem("itemCount");
    }
    //本地設定回顯
    $("#personCount").val(itemCount);

    //創建item小方格
    for (var i = 1; i <= itemCount; i++) {
        $("div.items").append("<div class='item i" + i + "'>" + i + "</div>");
    }
    //本機存放區item寬度信息
    if (localStorage.getItem("itemk")) {
        $("div.item").css("width", localStorage.getItem("itemk") + "px");
    }
    //本機存放區item高度資訊
    if (localStorage.getItem("itemg")) {
        $("div.item").css("height", localStorage.getItem("itemg") + "px");
        $("div.item").css("line-height", localStorage.getItem("itemg") + "px");
    }
    //回顯設定item寬高
    $("#itemk").attr("placeholder", $(".i1").css("width"));
    $("#itemg").attr("placeholder", $(".i1").css("height"));

    //初始化排序資訊
    $(".ss li").each(function (idx, item) {
        $(".i" + $(item).attr("data-number")).addClass("ignore");
    });

    //$("div.menu").css("height",$("div.items").css("height"));
    $("body").keyup(function (e) {
        keyStatus = false;
    });
    //全域鍵盤事件監聽
    $("body").keydown(function (e) {
        if (isStart) {
            if (!keyStatus) {
                keyStatus = true;
            } else {
                return false;
            }
        }
        if (e.keyCode == 116 || e.keyCode == 8) {
            return true;
        }
        //按F1彈出説明視窗
        if (e.keyCode == 112) {
            e.preventDefault();
            showReadme();
            return false;
        }
        //ESC案件呼出隱藏菜單
        if (e.keyCode == 27) {
            if ($(".help:hidden").size() > 0)
                $(".help").show();
            else
                $(".help").hide();

            return false;
        }

        if (e.keyCode == 37) {
            $(".prev").click();
            return false;
        }
        if (e.keyCode == 39) {
            $(".next").click();
            return false;
        }
        //當程式出於暫停狀態
        if (pause) {
            //以下按鍵有效 數位鍵 0-9 和 小鍵盤 0-9
            return true;
        }
        //存在未中獎使用者切程式出於未開始運行狀態執行開始方法
        if ((e.keyCode == 32 || e.keyCode == 65) && $("div.item:not(.ignore)").size() != 0 && !isStart) {
            isStart = !isStart;
            startApp();
            return false;
        }

        if (e.keyCode == 32 || e.keyCode == 65) {

            //當所有抽獎號全部抽取完畢則銷毀跑馬和音效迴圈
            if ($("div.item:not(.ignore)").size() == 0) {
                clearInterval(tx);
                clearInterval(runtx);
                //runingmic.puase();

                alert("抽獎已經全部結束。");
                return false;
            }
            //更新運行狀態
            isRun = !isRun;
            //如果專案出於運行狀態
            if (!isRun) {
                //取得當前選中號碼
                var it = $(".item.active").text();
                //停止跑馬燈
                //runingmic.pause();
                //Math.floor($(".sequence li").size()/ts)

                //播放中獎音效
                //pausemic.currentTime = 0;
                //pausemic.play();

                //中獎號處理
                var it = Number(it);

                $('.ss ol').append('<li data-number=' + it + '>' + it + "號" + '</li>');
                var r = '<h2>恭喜您，' + it + '！</h2>';
                var dd = dialog({
                    title: '抽獎結果',
                    content: r,
                    okValue: '確定'
                });
                dd.show();
                localStorage.setItem("sequence", $(".ss").html());
                $(".item.active").addClass("ignore");
                $(".item.active").pulsate({
                    color: zzs,        //#98ff98
                    repeat: 5
                });
            } else {
                $(".active").removeClass("active");
                //runingmic.play();
            }
        }

        e.preventDefault();
    });

    //打開高級設置視窗
    $("a.config").click(function () {
        pause = true;
        //runingmic.pause();
        var d = dialog({
            title: '抽獎參數設定',
            content: $(".model"),
            okValue: '確定',
            ok: function () {
                if ($("#reset:checked").val() && confirm("點擊確定將清空抽獎結果。")) {
                    localStorage.removeItem("sequence");
                }
                if ($("#personCount").val()) {
                    localStorage.setItem("itemCount", $("#personCount").val());
                }
                if ($("#itemk").val()) {
                    localStorage.setItem("itemk", $("#itemk").val());
                }
                if ($("#itemg").val()) {
                    localStorage.setItem("itemg", $("#itemg").val());
                }
                localStorage.setItem("title", $("#title").val());
                localStorage.setItem("ms", $("input[name=ms]:checked").val());
                localStorage.setItem("pf", $("input[name=pf]:checked").val());

                window.location.reload();
            }, onclose: function () {
                pause = false;
            }
        });
        d.show();
    });

    //清除錯誤中獎號
    $("body").on("click", ".item.ignore", function () {
        var inputItemCount = prompt("請輸入點擊的號碼來進行刪除中獎號碼（例如“12”）。");
        if (inputItemCount == $(this).text()) {
            $("li[data-number=" + $(this).text() + "]").remove();
            $(this).removeClass("ignore");
            localStorage.setItem("sequence", $(".ss").html());

        } else {
        }

    });
});
//程式開始入口
function startApp() {
    //開始播放跑馬燈音效
    //runingmic.play();
    //產生亂數臨時變數
    var rand = 0
    //存儲上一次亂數的臨時變數
    var prenum;
    tx = setInterval(function () {
        if (isRun) {
            while (true) {
                rand = Math.floor(Math.random() * ( $("div.item:not(.ignore)").size()));
                if (rand == 0 || rand != prenum) {
                    break;
                }
            }
            prenum = rand;
            $(".item.active").removeClass("active");
            $("div.item:not(.ignore):not(.active)").eq(rand).addClass("active");
        }
    }, pl);
    //runtx = setInterval(function(){runingmic.currentTime = 0;},7000);
    runtx = setInterval(function () {
    }, 7000);
}
function showReadme() {
    var d = dialog({
        title: '説明資訊',
        content: $(".readme"),
        width: '400px',
        okValue: '關閉',
        ok: function () {
        },
        onclose: function () {
            pause = false;
        }
    }).show();
}

var dynamicLoading = {

    css: function (path) {
        //console.log(path);
        if (!path || path.length === 0) {
            throw new Error('argument "path" is required !');
        }
        var head = document.getElementsByTagName('head')[0];
        var link = document.createElement('link');
        link.href = path;
        link.rel = 'stylesheet';
        link.type = 'text/css';
        head.appendChild(link);
    },
    js: function (path) {
        //console.log(path);
        if (!path || path.length === 0) {
            throw new Error('argument "path" is required !');
        }
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');

        script.src = path;
        script.type = 'text/javascript';
        head.appendChild(script);
    }
}
