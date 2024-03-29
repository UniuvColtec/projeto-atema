<?php

namespace App\Models;

use App\Bootgrid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Img;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'address'];
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:d/m/Y H:m:s', 'updated_at'=> 'date:d/m/Y H:m:s', 'deleted_at'=>'date:d/m/Y H:m:s'];


    public function bootgrid(object $request)
    {
        $bootgrid = new Bootgrid();
        $bootgrid->query($this, $request, ['address']);
        return $bootgrid;
    }

    public function imageCarrosel()
    {
        $resizedImage = Img::make($this->upload_dir() . $this->address);
        if ( ($resizedImage->getWidth()/$resizedImage->getHeight()) > 1.67 ){
            $resizedImage->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }else{
            $resizedImage->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        $resizedImage->crop(500, 300);
        $resizedImage->save($this->upload_dir() . $this->imageCapa());
    }

    public function imageCapa()
    {
        return 'capa_' . $this->address;
    }

    public function upload_dir()
    {
        return base_path('public/' . env('FILE_UPLOAD')) . '/';
    }
    public function uploadDirImageCapa()
    {
        return $this->upload_dir() . $this->imageCapa();
    }
    public function delete()
    {
        unlink($this->upload_dir() . $this->imageCapa());
        return parent::delete(); // TODO: Change the autogenerated stub
    }

}

