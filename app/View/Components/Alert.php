<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public bool $dismissible;

    protected array $types = [
        'success',
        'info',
        'danger',
        'warning',
    ];

    protected $classes = ['alert'];

    public function __construct($type = 'info', $dismissible = false)
    {
        $this->type = $this->validType($type);
        $this->dismissible = $dismissible;

        $this->classes[] = "alert-{$this->type}";

        if ($dismissible) {
            $this->classes[] = 'alert-dismissible fade show';
        }
    }

    public function render(): View
    {
        return view('components.alert');
    }

    public function validType($type): string
    {
        return in_array($type, $this->types) ? $type : 'info';
    }

    public function link($text, $target = '#'): HtmlString
    {
        return new HtmlString("<a href=\"{$target}\" class=\"alert-link\">{$text}</a>");
    }

    public function icon($url = null)
    {
        $this->classes[] = 'd-flex align-items-center';

        $icon = $url ?? asset("icons/icon-{$this->type}.svg");

        return new HtmlString("<img class=\"me-2\" src=\"{$icon}\" />");
    }

    public function getClasses(): string
    {
        return join(' ', $this->classes);
    }
}
