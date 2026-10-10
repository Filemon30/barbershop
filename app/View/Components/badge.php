<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class badge extends Component
{
    public string $color;

    public string $textColor;

    public string $bgColor;

    protected array $colors = [
        'gray'   => '#6b7280',
        'gold'   => '#d6a763',
        'red'    => '#ef4444',
        'green'  => '#10b981',
        'blue'   => '#3b82f6',
        'purple' => '#8b5cf6',
        'pink'   => '#ec4899',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $color = 'gray')
    {
        $this->color = strtolower($color);

        $hex = $this->colors[$this->color]
            ?? (preg_match('/^#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$/', $this->color) ? $this->color : null)
            ?? $this->colors['gray'];

        $this->textColor = $hex;
        $this->bgColor = $this->tint($hex, 0.85);
    }

    /**
     * Blend an hex color towards white to create a subtle tint.
     */
    private function tint(string $hex, float $percent): string
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        $r = min(255, round(hexdec(substr($hex, 0, 2)) + (255 - hexdec(substr($hex, 0, 2))) * $percent));
        $g = min(255, round(hexdec(substr($hex, 2, 2)) + (255 - hexdec(substr($hex, 2, 2))) * $percent));
        $b = min(255, round(hexdec(substr($hex, 4, 2)) + (255 - hexdec(substr($hex, 4, 2))) * $percent));

        return sprintf('#%02x%02x%02x', $r, $g, $b);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badge');
    }
}