<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SolveAssessment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:solve-assessment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Soal 1: Validasi Parentheses
        $this->info("Soal 1: " . ($this->isValidParentheses("([{}])") ? "Valid" : "Invalid"));

        // Soal 2: Merge Intervals
        $intervals = [[1, 3], [2, 6], [8, 10], [15, 18]];
        $this->info("Soal 2: " . json_encode($this->mergeIntervals($intervals)));

        // Soal 3: Longest Consecutive Subsequence
        $this->info("Soal 3: " . $this->longestConsecutive([100, 4, 200, 1, 3, 2]));
    }

    /**
     * isValidParentheses
     *
     * @param  mixed $s
     * @return void
     */
    private function isValidParentheses($s)
    {
        $stack = [];
        $map = [')' => '(', '}' => '{', ']' => '[', '>' => '<'];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (in_array($char, ['(', '{', '[', '<'])) {
                array_push($stack, $char);
            } elseif (isset($map[$char])) {
                if (empty($stack) || array_pop($stack) !== $map[$char]) {
                    return false;
                }
            }
        }
        return empty($stack);
    }

    /**
     * mergeIntervals
     *
     * @param  mixed $intervals
     * @return void
     */
    private function mergeIntervals($intervals)
    {
        usort($intervals, fn($a, $b) => $a[0] - $b[0]);
        $merged = [];

        foreach ($intervals as $interval) {
            if (empty($merged) || $merged[count($merged) - 1][1] < $interval[0]) {
                $merged[] = $interval;
            } else {
                $merged[count($merged) - 1][1] = max($merged[count($merged) - 1][1], $interval[1]);
            }
        }
        return $merged;
    }

    /**
     * longestConsecutive
     *
     * @param  mixed $nums
     * @return void
     */
    private function longestConsecutive($nums)
    {
        $set = array_flip($nums);
        $longest = 0;

        foreach ($nums as $num) {
            if (!isset($set[$num - 1])) {
                $length = 1;
                while (isset($set[$num + $length])) {
                    $length++;
                }
                $longest = max($longest, $length);
            }
        }
        return $longest;
    }
}
