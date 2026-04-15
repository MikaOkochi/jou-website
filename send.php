<?php
// --- 設定：ここにあなたのメールアドレスを入れます ---
$to = "aegislosys@gmail.com"; 
$subject = "【株式会社壌】公式サイトよりお問い合わせがありました";

// --- HTMLからのデータ受け取り ---
// your-name などは HTMLの name="..." と一致させる必要があります
$name    = $_POST['your-name'];
$email   = $_POST['your-email'];
$message = $_POST['your-message'];

// --- メールの本文作成 ---
$body = "公式サイトより以下のお問い合わせがありました。\n\n";
$body .= "--------------------------------------------------\n";
$body .= "【お名前】: $name\n";
$body .= "【メール】: $email\n";
$body .= "【内容】:\n$message\n";
$body .= "--------------------------------------------------\n";

// --- メールのヘッダー設定（送信元などの情報） ---
$headers = "From: contact@jou-inc.jp\n"; // 送信元（ドメインに合わせるのが理想）
$headers .= "Reply-To: $email\n";       // 返信先をお客様のメアドに設定
$headers .= "Content-Type: text/plain; charset=UTF-8\n";

// --- メール送信の実行 ---
$success = mb_send_mail($to, $subject, $body, $headers);

// --- 送信後の処理 ---
if ($success) {
    // 送信成功：完了ページへ飛ばすか、メッセージを表示
    echo "<script>alert('お問い合わせありがとうございます。送信が完了しました。'); location.href='index.html';</script>";
} else {
    // 送信失敗
    echo "<script>alert('送信に失敗しました。お手数ですが、時間をおいて再度お試しください。'); history.back();</script>";
}
?>