<?php
declare(strict_types=1);

/**
 * Handler13 —— 报表模板：把查询结果填进模板。
 *
 * 入口：POST /index.php?route=h13
 * 参数：$_POST['widget']['theme']
 */
final class Handler13
{
    public function handle(): void
    {
        $raw = $_POST['widget']['theme'] ?? '';

        // 先把尖括号引号转义再进模板，无法闭合标签
        $clean = htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');
        $theme = Util::forward($clean);

        // 模板渲染点：未转义变量直接进模板
        $html = $view->render('report', ['title' => 'Report', 'content' => $theme]);

        header('Content-Type: text/plain; charset=utf-8');
        echo is_string($body) ? $body : '';
    }
}
