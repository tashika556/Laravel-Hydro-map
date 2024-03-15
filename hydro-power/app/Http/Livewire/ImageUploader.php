<?php 
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploader extends Component
{
    use WithFileUploads;

    public $name;
    public $featuredImage;
    public $images = [];

    public function render()
    {
        return view('livewire.image-uploader');
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images); // Reset array keys
    }
}