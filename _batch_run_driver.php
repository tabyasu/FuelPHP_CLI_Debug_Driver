<?php
/**
 * FuelPHPのバッチ開発のデバッグ実行用ドライバ
 *
 * Eclipse で FuelPHP のtaskに作成したバッチをＣＬＩデバッグ実行するために使用します。
 *
 * 開発時のデバッグ実行用です。
 *
 * ※引数について
 * CLIデバッグではシェルコマンド同様にパラメータを取ります。
 * 実行する際は下記を参照しパラメータを設定してください。
 *
 * $args[0] = 実行するバッチクラス名
 * $args[1～N] = バッチに渡すパラメータ
 *
 * ｅ．ｇ．）
 * /SecureSamba_tougo/_batch_run_driver.php [クラス名] [params]
 */

echo "ドライバ開始\n";

/**
 * 環境設定
 */
define('DOCROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APPPATH', realpath(__DIR__ . '/fuel/app/') . DIRECTORY_SEPARATOR);
define('PKGPATH', realpath(__DIR__ . '/fuel/packages/') . DIRECTORY_SEPARATOR);
define('COREPATH', realpath(__DIR__ . '/fuel/core/') . DIRECTORY_SEPARATOR);
defined('FUEL_START_TIME') or define('FUEL_START_TIME', microtime(true));
defined('FUEL_START_MEM') or define('FUEL_START_MEM', memory_get_usage());

// Boot the app
require APPPATH . 'bootstrap.php';

Package::load('oil');

echo "バッチ実行\n";

// 対象のバッチを実行
Oil\Command::init(array_merge(array('', 'refine'), array_shift($argv)));

echo "ドライバ終了\n";
