<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Model\SliderModel;
use Session;
use Input;
use DB;
use Auth;

class SliderController extends Controller
{
    // Slider image form by obydul date 25-7-16
    public function slider_form(){
        if(Auth::check()){
        //show slider image by obydul date 25-7-16
        $slider_show = SliderModel::orderBy('id','desc')->paginate(4);
        return view('Backend.slider.slider_form',compact('slider_show'));
        }
        else{}
    }

    // Slider image uploading by obydul date 25-7-16
    public function  slider_upload(Request $request){
        if(Auth::check()){
        $validator = Validator::make($request->all(),[
            'image_title' => 'required',
            'picture'       => 'required | mimes:jpeg,jpg,png',
            'back_link'   => 'required'
        ]);
        if ($validator->fails())
        {
            Session::flash('error', 'Something went wrong!');
            return redirect::to("slider-form")->withErrors($validator);
        }else{
            $image                      =Input::file('picture');
            $uploadFolder               ='Slider_image';
            $createFileName             = time() . '.' . $image->getClientOriginalExtension();
            $moveFile                   =$image->move($uploadFolder,$createFileName);
            $image_upload               = new SliderModel;
            $image_upload->image_title  = $request->get('image_title');
            $image_upload->image        = $createFileName;
            $image_upload->back_link    = $request->get('back_link');
            $image_upload->save();
            Session::flash('success', 'Successfully Data Insert.');
            return redirect::to('slider-form')->withErrors($validator);

        }
        }
        else{}
    }

    public function slider_update(Request $request,$id){
        if(Auth::check()){
        $slider_update = SliderModel::find($id);
        if (Input::hasFile('picture')) {
            $extension3 = Input::file('picture')->getClientOriginalExtension();
            if ($extension3 == 'png' || $extension3 == 'jpg' || $extension3 == 'jpeg' || $extension3 == 'bmp' ||
                $extension3 == 'PNG' || $extension3 == 'jpg' || $extension3 == 'JPEG' || $extension3 == 'BMP') {
                $date = time();
                $fname = $date . '.' . $extension3;
                $final1=$fname;
                $image = Input::file('picture');
                $path = public_path('Slider_image/');
                $image->move($path,$final1);
                $re3 = SliderModel::where('id', '=', $id)->update(['image' => $final1]);
            } else {
                $re3 = SliderModel::where('pid', '=', $id)->update(['image' => '']);
            }
        }
            $slider_update->image_title  = $request->get('image_title');
           // $slider_update->image        = $createFileName;
            $slider_update->back_link    = $request->get('image_link');
            $slider_update->save();
            Session::flash('success', 'Successfully Data Update.');
            return redirect::to('slider-form');
        }
        else{}

    }

    //Delete slider image by obydul date 25-7-16
    public function slider_delete($id){
        if(Auth::check()){
        $slider_delete = SliderModel::find($id)->delete();
        return redirect::to('slider-form');
        }
        else{}
    }
    // slider controll display by obydul date:8-8-16
    public function slider_store(Request $request,$id){
        if(Auth::check()){
        $data         =  SliderModel::find($id);
        $data->status = $request->get('slider_store');
        $data->save();
        Session::flash('success', 'Successfully  Insert.');
        return redirect::to('slider-form');
        }
        else{}
    }


    //end class
}
