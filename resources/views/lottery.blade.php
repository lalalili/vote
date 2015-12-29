<html>
<head>
    <meta charset="utf-8">
    <title>抽獎</title>
    <link href="{{ asset('/css/style.css') }}" type="text/css" rel="stylesheet" media="screen, projection">
    <link href="{{ asset('/css/style1.css') }}" type="text/css" rel="stylesheet" media="screen, projection">
    <link href="{{ asset('/css/ui-dialog.css') }}" type="text/css" rel="stylesheet" media="screen, projection">
</head>

<body>
<div class="col-lg-12">
    <div id="page-wrapper">
        <div class="row">
            <div class="readme hide">
                <p>▪ 按鍵盤空白鍵或者字母A可進行抽取,隱藏功能表請按ESC。</p>

                <p>▪ ESC功能表中高級設置可以設置參與人數，格子大小，重置抽獎資料等資訊。</p>

                <p>▪ 點擊已經中獎格子並輸入點擊的格子編號可取消該格子中獎狀態，並清除中獎資訊。</p>

                <p>▪ 中獎資訊保存在本機上，如清理緩存活更換機器則記錄將消失。</p>

                <p>▪ 請使用Chrome流覽器流覽，在投影儀上展示，請進入流覽器的全屏模式流覽。</p>
            </div>
            <div class="model hide">
                <p><b>標題：</b><input type="text" id="title" class="ui-dialog-autofocus" value=""
                                    placeholder="輸入標題，可以為空。"/></p>

                <p><b>人數：</b><input type="text" id="personCount" class="ui-dialog-autofocus" value=""
                                    placeholder="輸入人數，請輸入數字。"/></p>

                <p><b>方格寬：</b><input type="text" id="itemk"></p>

                <p><b>方格高：</b><input type="text" id="itemg"></p>

                <p class="line"><label><input type="radio" name="ms" style="width:15px;" checked
                                              value="50">眼花繚亂模式</label>
                    <label><input type="radio" name="ms" style="width:15px;" value="300">驚心動魄模式</label></p>

                <p><label>藍色經典<input type="radio" name="pf" style="width:15px;" checked value="1"></label>
                    <label>清新典雅<input type="radio" name="pf" style="width:15px;" value="2"></label></p>

                <p class="line"><label><input type="checkbox" id="reset" value="1"/>重置已產生的抽獎資料</label></p>
            </div>
            <div class="top">抽獎</div>
            <div class="items"></div>
            <div class="menu">
                <div class="help">
                    按鍵盤空白鍵或者字母A可進行抽取,查看幫助請按F1,隱藏請按ESC。
                    <a href="javascript:;" class="config">高級設定</a>
                </div>
                <div class="ss">
                    <h2>中獎結果：</h2>
                    <ol></ol>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery.pulsate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/dialog-plus-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/lottery.js') }}"></script>
</body>
</html>