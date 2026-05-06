<?php

namespace App\Services;

class CliftonStrengthService
{
    /**
     * Data statis bakat per domain
     */
    public static function matrix()
    {
        return [
            'Thinking' => [
                'Analytical',
                'Context',
                'Futuristic',
                'Ideation',
                'Input',
                'Intellection',
                'Learner',
                'Strategic',
            ],
            'Striving' => [
                'Achiever',
                'Arranger',
                'Belief',
                'Consistency',
                'Deliberative',
                'Discipline',
                'Focus',
                'Responsibility',
                'Restorative',
            ],
            'Influencing' => [
                'Activator',
                'Command',
                'Communication',
                'Competition',
                'Maximizer',
                'Self-Assurance',
                'Significance',
                'WOO (Winning Others Over)',
            ],
            'Relating' => [
                'Adaptability',
                'Connectedness',
                'Developer',
                'Empathy',
                'Harmony',
                'Includer',
                'Individualization',
                'Positivity',
                'Relator',
            ],
        ];
    }

    /**
     * Tentukan warna berdasarkan rank
     */
    public static function colorByPosition(int $position): string
    {
        return match (true) {
            $position <= 7  => 'red',
            $position <= 14 => 'yellow',
            $position <= 20 => 'white',
            $position <= 27 => 'gray',
            default     => 'black',
        };
    }
}
