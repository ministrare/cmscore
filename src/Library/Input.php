<?php

namespace Ministrare\Cmscore\Library;

use Illuminate\Support\Facades\View;

/**
 * Class Input
 * @package Ministrare\Cmscore\Library
 *
 * Form input helper class
 */
class Input
{
    /**
     * Form Input: [type=text]
     *
     * @Description           : HTML input element.
     * @param string $slug    : Slug used as id, name,
     * @param string $name    : Label text.
     * @param array $options  : Array containing *Options*.
     * - Autofocus (boolean)  : Adds the autofocus attribute the the input element.
     * - Class (string)       : Class override used for Parent Container.
     * - Icon (string)        : Font Awesome Icon, Will replace label.
     * - Message (string)     : The warning message if the element fails
     * - Placeholder (string) : String, Add a entry to the placeholder attribute.
     * - Required (boolean)   : Adds the required attribute.
     * - Small (string)       : Adds the string as Tiny text to the element.
     * @return \Illuminate\Contracts\View\View
     */
    public function text(string $slug, string $name, array $options = [])
    {
        $settings = [
            'name' => $name,
            'slug' => Utilities::createSlug($slug),
        ];

        foreach($options as $optionKey => $optionValue)
        {
            $settings[$optionKey] = $optionValue;
        }

        $view = View::make('cmscore::library.input', compact('settings'));
        echo $view->renderSections()['text'];
        return null;
    }
}
