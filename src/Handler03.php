<?php
declare(strict_types=1);

/**
 * Handler03 —— 看板组件：渲染用户提供的小组件。
 *
 * 入口：POST /index.php?route=h03
 * 参数：$_REQUEST['page']['widget']
 */
final class Handler03
{
    public function handle(): void
    {
        $raw = $_REQUEST['page']['widget'] ?? '';

        $widget = Util::forward($raw);

        // 模板渲染点：未转义变量直接进模板
        $html = $view->render('dashboard', ['widget' => '<b>' . $widget . '</b>']);

        header('Content-Type: text/plain; charset=utf-8');
        echo is_string($body) ? $body : '';
    }
}
