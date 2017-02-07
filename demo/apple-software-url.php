<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__) . '/../core/init.php';

/* Do NOT delete this comment */
/* 不要删除这段注释 */

getGameUrl();

function getGameUrl(){
    for ($i = 0; $i <= 20; $i++) {
        // 全国热点城市
        $url = "http://www.sdifenzhou.com/archives/category/game-download/page/{$i}/";
        $html = requests::get($url);

        $selector = '@<h1 class="entry-title"><a href="(.*?)" title="@';
        // 提取结果
        $result = selector::select($html, $selector, 'regex');
        if (!empty($result)) {
            foreach ($result as $val) {
                $data = array(
                    'url' => $val,
                    'md5' => md5($val),
                    'type' => 'GAME',
                );
                $row = db::get_one("Select * From `_apple_software_url` WHERE `md5`='{$data['md5']}'");
                if (empty($row)) {
                    db::insert("_apple_software_url", $data);
                }
            }
        }
    }
}


function getQuestionUrl(){
    for ($i = 0; $i <= 20; $i++) {
        // 全国热点城市
        $url = "http://www.sdifenzhou.com/archives/category/black-apple/question/page/{$i}/";
        $html = requests::get($url);

        $selector = '@<h1 class="entry-title"><a href="(.*?)" title="@';
        // 提取结果
        $result = selector::select($html, $selector, 'regex');
        if (!empty($result)) {
            foreach ($result as $val) {
                $data = array(
                    'url' => $val,
                    'md5' => md5($val),
                    'type' => 'QUESTION',
                );
                $row = db::get_one("Select * From `_apple_software_url` WHERE `md5`='{$data['md5']}'");
                if (empty($row)) {
                    db::insert("_apple_software_url", $data);
                }
            }
        }
    }
}

function getSoftUrl(){
    for ($i = 0; $i <= 300; $i++) {
        // 全国热点城市
        $url = "http://www.sdifenzhou.com/archives/category/black-apple/apple-software/page/{$i}/";
        $html = requests::get($url);

        $selector = '@<h1 class="entry-title"><a href="(.*?)" title="@';
        // 提取结果
        $result = selector::select($html, $selector, 'regex');
        if (!empty($result)) {
            foreach ($result as $val) {
                $data = array(
                    'url' => $val,
                    'md5' => md5($val)
                );
                $row = db::get_one("Select * From `_apple_software_url` WHERE `md5`='{$data['md5']}'");
                if (empty($row)) {
                    db::insert("_apple_software_url", $data);
                }
            }
        }
    }
}





