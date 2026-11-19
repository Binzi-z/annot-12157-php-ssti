<?php
declare(strict_types=1);

/**
 * Handler05 —— 模板预览：读取模板目录中的片段。
 *
 * 入口：POST /index.php?route=h05
 * 参数：$_POST['template']
 */
final class Handler05
{
    public function handle(): void
    {
        $raw = $_POST['template'] ?? '';

        // 只取路径最后一段，去掉目录分隔符
        $clean = basename($raw);
        $name = Util::forward($clean);

        // 按文件名读取数据目录
        $body = file_get_contents(Util::DATA_DIR . '/templates/' . $name);

        header('Content-Type: text/plain; charset=utf-8');
        echo is_string($body) ? $body : '';
    }
}
