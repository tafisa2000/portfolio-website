<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class AboutController extends Controller
{
     public function AboutPage(){
        $aboutPage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutPage'));
    }//end method

    public function UpdateAbout(Request $request){

        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(523,605)->save('upload/home_about/'.$name_gen);
            $save_url = 'upload/home_about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'About Page Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } else{

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,

            ]); 
            $notification = array(
            'message' => 'About Image Updated without Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end Else

     } // End Method 

     public function HomeAbout(){
        $aboutPage = About::find(1);
        return view('frontend.about',compact('aboutPage'));
     }// End Method

     public function AboutMultImage(){
        return view ('admin.about_page.multImage');

     }// End Method

     public function StoreMultImage(Request $request){
        $image = $request->file('mult_image');

        foreach ( $image as $mult_image){
             $name_gen = hexdec(uniqid()).'.'.$mult_image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($mult_image)->resize(220,220)->save('upload/mult/'.$name_gen);
            $save_url = 'upload/mult/'.$name_gen;

            MultImage::insert([
                'mult_image' => $save_url,
                'created_at' => Carbon::now()

            ]); 
         }

            $notification = array(
            'message' => 'Multiple Image inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.mult.image')->with($notification);
            

     }// End Method

     public function AllMultImage() 
     {
$allMultImage = MultImage::all();
return view('admin.about_page.all_multimage',compact('allMultImage'));
     }// End Method

     public function EditMultImage($id){
        $multImage = MultImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('multImage'));

     }// End Method

     public function UpdateMultImage(Request $request){
          $mult_image_id = $request->id;

        if ($request->file('mult_image')) {
            $image = $request->file('mult_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(220,220)->save('upload/mult/'.$name_gen);
            $save_url = 'upload/mult/'.$name_gen;

            MultImage::findOrFail($mult_image_id)->update([
              
                'mult_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Mult Updated Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.mult.image')->with($notification);

        }
        
     }

     public function DeleteMultImage($id){
      
        $mult = MultImage::findOrFail($id);
        $img = $mult->mult_image;
       if (file_exists($img)) {
    unlink($img);
} else {
    // Handle the case where the file doesn't exist or is already deleted.
}



        MultImage::findOrFail($id)->delete();

        
            $notification = array(
            'message' => 'Mult Updated Delete Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }
}