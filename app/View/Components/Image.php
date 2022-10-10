<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{

    public $image;

    public $altName;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($idImage, $altName)
    {
        $image = \App\Models\Image::find($idImage);
        $this->image = ($image && is_file($image->uploadDirImageCapa()) ? asset('files/' . $image->imageCapa()) : '/images/none-image.png' );
        $this->altName = $altName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image');
    }
}
