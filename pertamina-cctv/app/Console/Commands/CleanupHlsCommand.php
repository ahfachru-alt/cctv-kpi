<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupHlsCommand extends Command
{
	protected $signature = 'streams:cleanup {--minutes=30}';
	protected $description = 'Cleanup stale HLS stream folders older than given minutes without active playlist update';

	public function handle(): int
	{
		$minutes = (int)$this->option('minutes');
		$dir = storage_path('app/public/streams');
		if (!is_dir($dir)) {
			$this->info('Streams directory not found.');
			return self::SUCCESS;
		}
		$threshold = now()->subMinutes($minutes)->getTimestamp();
		$removed = 0;
		foreach (scandir($dir) as $entry) {
			if ($entry === '.' || $entry === '..') continue;
			$path = $dir.DIRECTORY_SEPARATOR.$entry;
			$playlist = $path.DIRECTORY_SEPARATOR.'index.m3u8';
			if (is_dir($path) && file_exists($playlist)) {
				$mtime = @filemtime($playlist) ?: 0;
				if ($mtime < $threshold) {
					$this->deleteDir($path);
					$removed++;
				}
			}
		}
		$this->info("Removed {$removed} stale stream folder(s).");
		return self::SUCCESS;
	}

	private function deleteDir(string $dir): void
	{
		$items = array_diff(scandir($dir), ['.','..']);
		foreach ($items as $item) {
			$path = $dir.DIRECTORY_SEPARATOR.$item;
			if (is_dir($path)) $this->deleteDir($path); else @unlink($path);
		}
		@rmdir($dir);
	}
}