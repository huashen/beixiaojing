<?php
/*
*日志类
*/
class Log
{
	const LOG_FILE = 'curr.log';

	/*
	*写日志
	*/
	public static function write($content) 
	{
		$content .= "\r\n";
		$log = self :: isBak();

		$fh = fopen($log, 'ab');
		fwrite($fh, $content);
		fclose($fh);
	}

	/*
	*备份日志
	*/
	private static function bak()
	{
		$log = ROOT . 'data/log/' . self :: LOG_FILE;
		$bak = ROOT . 'data/log/' . date('ymd') . mt_rand(10000,9999) . '.bak';
		return rename($log, $bak);
	}

	/*
	*判断并读取日志大小
	*/
	public static function isBak()
	{
		$log = ROOT . 'data/log/' . self :: LOG_FILE;
		if(!file_exists($log)) {
			touch($log);
			return $log;
		}

		clearstatcache(true,$log); //清除缓存
		$size = filesize($log);
		if($size <= 1024 * 1024) {
			return $log;
		}

		if(!self :: bak()) {//备份失败
			return $log;
		}else {//备份成功
			touch($log);
			return $log;
		}
	}
}
