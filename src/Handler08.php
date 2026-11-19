<?php
declare(strict_types=1);

/**
 * Handler08 —— 主题模板渲染：返回渲染后的页面片段。
 *
 * 入口：POST /index.php?route=h08
 * 参数：$_GET['tpl']['tpl']
 */
final class Handler08
{
    public function handle(): void
    {
        $raw = $_GET['tpl']['tpl'] ?? '';

        $tpl = Util::forward($raw);

        // 模板渲染点：未转义变量直接进模板
        $html = $view->render('page', ['body' => $tpl]);

        header('Content-Type: text/plain; charset=utf-8');
        echo is_string($body) ? $body : '';
    }
}
