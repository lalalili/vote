<?php
namespace Luxgen\Presenter;

use Auth;

class RolePresenter
{
    public function getRole()
    {
        return Auth::user()->roles->pluck('name')->first();
    }

    public function pullupMenu()
    {
        switch ($this->getRole()) {
            case 'la-owner':
                return '<a href="/admin/signup/choose/la"> 新增報名</a>';
                break;
            case 'lb-owner':
                return '<a href="/admin/signup/choose/lb"> 新增報名</a>';
                break;
            case 'lc-owner':
                return '<a href="/admin/signup/choose/lc"> 新增報名</a>';
                break;
            case 'ld-owner':
                return '<a href="/admin/signup/choose/ld"> 新增報名</a>';
                break;
            case 'le-owner':
                return '<a href="/admin/signup/choose/le"> 新增報名</a>';
                break;
            case 'luxgen-owner':
                return '<a href="/admin/signup/choose/luxgen"> 新增報名</a>';
                break;
            case 'admin':
                return '<a href="/admin/signup/choose/all"> 新增報名</a>';
                break;
        }

    }

    public function adminMenu()
    {
        if ($this->getRole() == 'admin') {
            return '
                                <li class="active">
                        <a href="#"><i class="fa fa-calculator fa-fw"></i> 課程報名管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="/admin/project/list"> 課程項目</a>
                            </li>
                            <li>
                                <a href="/admin/course/list"> 課別</a>
                            </li>
                            <li>
                                <a href="/admin/event/list"> 場次</a>
                            </li>
                            <li>
                                <a href="/admin/employee/list"> 員工個資</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-heart fa-fw"></i> 感動服務管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="/admin/touching2/list_title"> 編輯TITLE</a>
                            </li>
                            <li>
                                <a href="/admin/touching2/lists"> 編輯感動服務</a>
                            </li>
                            <li>
                                <a href="/admin/touching/poll/list"> 投票結果</a>
                            </li>
                            <li>
                                <a href="/admin/touching/edit"> 清空投票</a>
                            </li>
                            <li>
                                <a onclick="window.open(this.href,\'_blank\');return false;" href="/touching/show"> 檢視感動服務</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> 系統設定<span
                                                    class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/admin/signup/list"> 報名列表</a>
                    </li>
                    <li>
                        <a href="/admin/adv"> 進階功能</a>
                    </li>
                    <li>
                        <a href="/admin/wall/1"> 相片牆</a>
                    </li>
                    <li>
                        <a href="/lottery" target="_blank"> 抽獎</a>
                    </li>
                    <li>
                        <a href="#"> 設定管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="/admin/album/list"> 據點管理</a>
                            </li>
                            <li>
                                <a href="/admin/title/list"> 職稱管理</a>
                            </li>
                            <li>
                                <a href="/admin/photo/adminlist"> 員工管理</a>
                            </li>
                            <li>
                                <a href="/admin/whitelist/list"> 白名單管理</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i>舊版<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
            <li>
                <a href="#"><i class="fa fa-thumbs-o-up fa-fw"></i> 2015禮貌大使<span
                                                    class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/admin/vote/list"> 投票列表</a>
                    </li>
                    <li>
                        <a href="/admin/summary"> 總攬</a>
                    </li>
                    <li>
                        <a href="/admin/vote/postlist"> 投票列表(已處理)</a>
                    </li>
                    <li>
                        <a href="/admin/post_summary"> 總攬(已處理)</a>
                    </li>
                    <li>
                        <a href="/admin/vote/whitelist"> 白名單投票列表</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                        <a href="#"><i class="fa fa-heart fa-fw"></i> 感動服務管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="/admin/touching/edit"> 編輯內容</a>
                            </li>
                            <li>
                                <a href="/admin/touching/poll/list"> 投票結果</a>
                            </li>
                            <li>
                                <a onclick="window.open(this.href,\'_blank\');return false;" href="/touching/show"> 檢視每月投票</a>
                            </li>
                            <li>
                                <a onclick="window.open(this.href,\'_blank\');return false;" href="/touching/yearly"> 檢視年度</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
            </li>
            <ul></li>';

        }
    }
}