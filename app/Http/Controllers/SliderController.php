<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    //
    public function ajouterslider(){
                return view('admin.ajouterslider');
            }


    public function sauverslider(Request $request){

                            $this->validate($request, ['name_slider' => 'required',
                                                        'description' => 'required',
                                                        'slider_image' => 'image|nullable|max:1999']);

            
                    if ($request->hasFile('slider_image')) {
                    # 1 get file name with ext
                    $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
                    // 2 get just file name 
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    // 3 get just file extension
                    $extension = $request->file('slider_image')->getClientOriginalExtension();
                    // 4 file name to store
                    $fileNameTotore = $fileName.'_'.time().'.'.$extension;

                    // uploader l'image
                    $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameTotore);
                    }

                    else {
                            $fileNameTotore = 'noimage.jpg';
                    }

                    $slider = new Slider();
                    $slider->name_slider = $request->input('name_slider');
                    $slider->description = $request->input('description');
                    $slider->slider_image = $fileNameTotore;
                    $slider->status = 1;

                    $slider->save();

                    return redirect('/ajouterslider')->with('status', 'Le sldier a été inséré avec succès !');


        }

 

    public function slider(){
        
                            $sliders = Slider::get();
                            return view('admin.slider')->with('sliders', $sliders);
                        }

                        public function edit_slider($id){

                            $slider = Slider::find($id);

                            return view('admin.editslider')->with('slider', $slider);
                    }

    
    public function modifierslider(Request $request){
        
                $this->validate($request, ['name_slider' => 'required',
                                            'description' => 'required',
                                            'slider_image' => 'image|nullable|max:1999']);
                
                $slider = Slider::find($request->input('id'));
                
                $slider->name_slider = $request->input('name_slider');
                $slider->description = $request->input('description');
            
                $slider->status = 1;                            

                                                                                                                                                        
                if ($request->hasFile('slider_image')) {
                    # 1 get file name with ext
                    $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
                    // 2 get just file name 
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    // 3 get just file extension
                    $extension = $request->file('slider_image')->getClientOriginalExtension();
                        // 4 file name to store
                    $fileNameTotore = $fileName.'_'.time().'.'.$extension;

                    // uploader l'image
                    $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameTotore);
                    $slider->slider_image = $fileNameTotore;
                }
                    $slider->update();

                    
                return redirect('/slider')->with('status', 'Le slider ' .$slider->name_slider. 'a été modifier avec succès !');

          }

          public function supprimer_slider($id){

                
                $slider = Slider::find($id);

                $slider->delete();

                return redirect('/slider')->with('status', 'Le slider ' .$slider->name_slider. 'a été supprimer avec succès !');


          }



          public function activer_slider($id){

            $slider =Slider::find($id);

            $slider->status = 1;

            $slider->update();

            return redirect('/slider')->with('status', 'Le slider  a été activer avec succès !');

    }


    public function desactiver_slider($id){

        $slider = Slider::find($id);

        $slider->status = 0;

        $slider->update();

        return redirect('/slider')->with('status', 'Le slider  a été désactiver avec succès !');

}

                                
     
}
