<?php
use Hekmatinasser\Verta\Verta;

if(! function_exists('changeDateToPersian')) {
    function changeDateToPersian($date, $format) {
      $dateVerta = new Verta($date);
      return $dateVerta->format($format);
    }
}

/**
 * create new item menu link
 *
 * @return string
 */
if (! function_exists('menu')) {
    function menu($arrayUrl) {
        if(url()->current() == route($arrayUrl['url'])) { $active = 'active'; } else { $active = null; }
        $link = '<li class="nav-item">
                    <a href="'.route($arrayUrl['url']).'" class="nav-link '.$active.'">
                    <i class="'.$arrayUrl['icon'].'"></i>
                    <p>'.$arrayUrl['name'].'</p>
                    </a>
                </li>';
        return $link;
    }
}

/**
 * create new item sub menu link
 *
 * @return string
 */
if (! function_exists('submenu')) {
    function submenu($arrayUrl) {
        $menus = '';
        foreach($arrayUrl['urls'] as $key => $item) {
        if(url()->current() == route($item)) { $activeSubMenu = 'active'; } else { $activeSubMenu = null; }
        $menus .= '<li class="nav-item">
                        <a href="'.route($item).'" class="nav-link '.$activeSubMenu.'">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>'.$arrayUrl['names'][$key].'</p>
                        </a>
                    </li>';
        }
        if(str_contains(url()->current(), $arrayUrl['nameActive'])) {
            $active = 'active'; $menuOpen = 'menu-open';
        } else { $active = ''; $menuOpen = ''; }
        $link = '<li class="nav-item has-treeview '.$menuOpen.'">
                    <a href="#" class="nav-link '.$active.'">
                    <i class="'.$arrayUrl['icon'].'"></i>
                    <p>'.$arrayUrl['mainName'].'<i class="right fa fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">'.$menus.'</ul>
                </li>';
        return $link;
    }
}