<?php

namespace App\Traits;

use Carbon\Carbon;
use File;
use Illuminate\Support\Str;
use Image;

trait ImageTrait
{
    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = storage_path('app/public/images');
        $this->dimensions = ['245', '300', '500'];
    }

    public function storeImage($collection, $request)
    {
        if ($request->has('image')) {
            $this->deleteImage($collection);

            $file = $request->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->save($this->path . '/' . $fileName, 60);

            $collection->update([
                'image' => $fileName
            ]);
        }
    }

    public function deleteImage($collection)
    {
        File::delete($this->path . '/' . $collection->image);
    }
}
