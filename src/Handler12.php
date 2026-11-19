<?php
declare(strict_types=1);

/**
 * Handler12 —— 主题模板渲染：返回渲染后的页面片段。
 *
 * 入口：POST /index.php?route=h12
 * 参数：$_GET['tpl']['tpl']
 */
final class Handler12
{
    public function handle(): void
    {
        $raw = $_GET['tpl']['tpl'] ?? '';

        // 先把尖括号引号转义再进模板，无法闭合标签
        $clean = htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');
        $tpl = Util::forward($clean);

        // 模板渲染点：未转义变量直接进模板
        $html = $view->render('page', ['body' => $tpl]);

        header('Content-Type: text/plain; charset=utf-8');
        echo is_string($body) ? $body : '';
    }
}
