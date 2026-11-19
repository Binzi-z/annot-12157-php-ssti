<?php
declare(strict_types=1);

/**
 * Handler01 —— 报表模板：把查询结果填进模板。
 *
 * 入口：POST /index.php?route=h01
 * 参数：$_POST['widget']['theme']
 */
final class Handler01
{
    public function handle(): void
    {
        $raw = $_POST['widget']['theme'] ?? '';

        $theme = Util::forward($raw);

        // 模板渲染点：未转义变量直接进模板
        $html = $view->render('report', ['title' => 'Report', 'content' => $theme]);

        header('Content-Type: text/plain; charset=utf-8');
        echo is_string($body) ? $body : '';
    }
}
