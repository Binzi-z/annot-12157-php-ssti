<?php
declare(strict_types=1);

/**
 * Handler10 —— 附件查看：按文件名读取上传目录。
 *
 * 入口：GET /index.php?route=h10
 * 参数：$_GET['file']
 */
final class Handler10
{
    public function handle(): void
    {
        $raw = $_GET['file'] ?? '';

        $name = Util::forward($raw);

        // 按文件名读取数据目录
        $body = file_get_contents(Util::DATA_DIR . '/uploads/' . $name);

        header('Content-Type: text/plain; charset=utf-8');
        echo is_string($body) ? $body : '';
    }
}
